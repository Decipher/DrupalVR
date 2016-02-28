DrupalVR
========

This is a demonstration installation profile to showcase Drupal 8 powered
Virtual Reality.

_**Note:** This is only an early proof of concept and is still under active
development._



Installation
------------

This repository is configured for [Beetbox](http://beetbox.rtfd.org).

**Requirements:**

* [Vagrant](https://www.vagrantup.com/) >= 1.8
* [Virtualbox](https://www.virtualbox.org/)
* (Windows only) [Vagrant::Hostsupdater](https://github.com/cogitatio/vagrant-hostsupdater)
* (Windows only) [Vagrant Auto-network](https://github.com/oscar-stack/vagrant-auto_network)

**Steps:**

```
git clone https://github.com/Decipher/DrupalVR.git
cd DrupalVR
vagrant up
open http://drupalvr.local
```