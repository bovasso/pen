set :application, "penpalnews"
set :repository,  "git@github.com:bovasso/pen.git"

set :scm, :git

role :web, "50.56.176.28"                          # Your HTTP server, Apache/etc
role :app, "50.56.176.28"                          # This may be the same as your `Web` server

set :deploy_to, "/var/www/penpalnews/"
set :deploy_via, :remote_cache
set :local_repository, "." 
set :repository_cache, "cached_copy"

#set :copy_cache, true
set :branch, "master"
set :use_sudo, false
set :user, "deploy"  # The server's user for deploys

default_run_options[:pty] = true  # Must be set for the password prompt from git to work
set :scm_verbose, true
set :ssh_options, {:forward_agent => true}
 
