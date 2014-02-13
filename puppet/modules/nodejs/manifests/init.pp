class nodejs
{
	$nodeVersion = "v0.10.17"
	$nodeRepo = "https://github.com/joyent/node.git"

	exec
	{
		"clone-node-repo":
			cwd => "/home/vagrant",
			command => "git clone $nodeRepo node-source",
			require => Package["git"],
                        timeout => 0
	}

	exec
	{
		"checkout-node-version":
			cwd => "/home/vagrant/node-source",
			command => "git checkout $nodeVersion",
			require => [Package["git"], Exec["clone-node-repo"]],
                        timeout => 0
	}

	exec
	{
		"configure-node":
			cwd => "/home/vagrant/node-source",
			command => "python configure",
			require => Exec["checkout-node-version"],
                        timeout => 0
	}

	exec
	{
		"make-node":
			cwd => "/home/vagrant/node-source",
			command => "make",
			require => Exec["configure-node"],
                        timeout => 0
	}

	exec
	{
		"make-install-node":
			cwd => "/home/vagrant/node-source",
			command => "sudo make install",
			require => Exec["make-node"],
			timeout => 0
	}
}
