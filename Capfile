load 'deploy' if respond_to?(:namespace) # cap2 differentiator

Dir['vendor/gems/*/recipes/*.rb','vendor/plugins/*/recipes/*.rb'].each { |plugin| load(plugin) }

namespace :deploy do
  task :restart do
   run "rm -v #{current_path}/index.php" 
   run "cp #{current_path}/index.#{stage}.php #{current_path}/index.php"
   run "ln -s #{shared_path}/uploads/profiles #{current_path}/public/profiles" 
   # run "rm -v #{current_path}/webapp/front/index.php" 
   # run "cp #{current_path}/webapp/front/index.php.#{stage}.php #{current_path}/webapp/front/index.php"       
   # run "mkdir -p #{current_path}/webapp/front/application/cache"       
   # run "chmod 777 #{current_path}/webapp/front/application/cache"       
  end
end

load 'config/deploy' # remove this line to skip loading any of the default tasks