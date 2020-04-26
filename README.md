# whaledisentanglement
This is the source code used for the http://www.whaledisentanglement.org/ site. The same code is used for 
all three subdomains (media, hawaii-alaska, and west-coast). This is a mysql, php, nginx, wordpress site. It has one custom plugin 'users-only-access'. This plugin prevents non logged-in users from accessing images in the uploads folder. The other plugins are from a 3rd party.  

## To run the site

1. Download the source.
1. Install habitat, `curl https://raw.githubusercontent.com/habitat-sh/habitat/master/components/hab/install.sh | bash`
1. Install direnv. Or source the `.envrc` file.
1. Enter habitat studio, `hab studio enter`
1. Then run `start`
1. The goto localhost:8080

## To load mysql data
1. From the studio run `mysql_load_data <data.sql>`

## To load existing images
1. Copy 'upload' folder to `/hab/svc/whaledisentanglement/data/wp-content`

## convert to http from https
1. Run `to_http` in the studio
