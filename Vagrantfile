# -*- mode: ruby -*-
# vi: set ft=ruby :

# change these values
VAGRANT_DOMAIN_NAME = "local.conflictsensitivity.org"
VAGRANT_IP_ADDRESS = "192.168.33.143"


# Vagrantfile API/syntax version. Don't touch unless you know what you're doing!
VAGRANTFILE_API_VERSION = "2"


Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  # All Vagrant configuration is done here. The most common configuration
  # options are documented and commented below. For a complete reference,
  # please see the online documentation at vagrantup.com.

  # Every Vagrant virtual environment requires a box to build off of.
  config.vm.box = "hashicorp/precise64"

  config.vm.provision :shell, path: "Vagrant-config/Vagrant-bootstrap.sh"


  # Create a private network, which allows host-only access to the machine
  # using a specific IP.
  config.vm.network "private_network", ip: VAGRANT_IP_ADDRESS
  config.vm.hostname = VAGRANT_DOMAIN_NAME
  config.vm.network :forwarded_port,
    guest: 22,
    host: 2201,
    id: "ssh",
    auto_correct: true

  # Share an additional folder to the guest VM. The first argument is
  # the path on the host to the actual folder. The second argument is
  # the path on the guest to mount the folder. And the optional third
  # argument is a set of non-required options.
  config.vm.synced_folder ".", "/srv", :mount_options => ["dmode=777,fmode=777"]

end
