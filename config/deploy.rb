require 'capistrano/ext/multistage'
set :stages, %w(staging production dev)
set :default_stage, "staging"
ssh_options[:keys] = [File.join(ENV["HOME"], ".ssh", "deploy_id_rsa")]

