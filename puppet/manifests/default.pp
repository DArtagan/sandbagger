# Basics
Exec {
  path => ['/usr/bin', '/bin', '/usr/sbin', '/sbin', '/usr/local/bin', '/usr/local/sbin']
}
exec { 
    'apt-get update':
        command => '/usr/bin/apt-get update';
}
package { 
	'make':
		ensure  => present,
		require => Exec['apt-get update'];
	'build-essential':
		ensure  => present,
		require => Exec['apt-get update'];
}
include bootstrap

# Apache
class {
	'apache':
		mpm_module => 'prefork',
		servername => 'localhost',
                default_vhost => false,
                sendfile => 'off',
		require => Exec['apt-get update'];
	'apache::mod::php':
		require => Exec['apt-get update'];
}
apache::vhost { 
	'localhost':
		port    => '80',
		docroot => '/home/vagrant/www/public_html',
                override => 'All',
}
class { 'apache::mod::rewrite': }

# PHP
class {
	'php':
		service => 'apache',
		require => Exec['apt-get update'];
}

# Mysql
class {
	'mysql':
		require => Exec['apt-get update'];
	'mysql::php':
		require => Exec['apt-get update'];
	'mysql::server':
		config_hash => { 'root_password' => 'yeopress' },
		require => Exec['apt-get update'];
}
mysql::db {
	'yeopress':
		user     => 'yeopress',
		password => 'yeopress',
		host     => 'localhost',
		grant    => ['all'],
}

# Git
include git

# Node
include nodejs
