# whaledisentanglement
This is the source code used for the http://www.whaledisentanglement.org/ site. The same code is used for 
all three subdomains (media, hawaii-alaska, and west-coast). This is a mysql, php, nginx, wordpress site. It has some custom plugins. One of the plugins is 'users-only-access' that prevents non login users from accessing images in the uploads folder. The other plugins are 3rd party.  

## To run the site

1. Download the source.
1. Install habitat, `curl https://raw.githubusercontent.com/habitat-sh/habitat/master/components/hab/install.sh | bash`
1. Install direnv. Or source the `.envrc` file.
1. Enter habitat studio, `hab studio enter`
1. Then run `start`
1. The goto localhost:8080
