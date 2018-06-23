<?php
namespace Deployer;

require 'recipe/laravel.php';

set('ssh_type', 'native');
set('ssh_multiplexing', false);
// Project name
set('application', 'deltion-bus');

// Project repository
set('repository', 'git@github.com:BramKlapwijk/deltionbus-portal.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', false);

// Shared files/dirs between deploys
add('shared_files', []);
add('shared_dirs', []);

// Writable dirs by web server
add('writable_dirs', []);


// Hosts
host('production')
    ->hostname('deltion-bus.bram-klapwijk.nl')
    ->user('root')
    ->identityFile('~/.ssh/id_rsa')
    ->set('deploy_path', '/var/www/{{application}}/production')
    ->stage('production');

// Tasks

task('build', function () {
    run('cd {{release_path}} && build');
});

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

before('deploy:symlink', 'artisan:migrate');
desc('Deploy your project');
task('deploy', [
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:vendors',
    'deploy:writable',
    'artisan:migrate',
//    'artisan:db:seed',
    'artisan:view:clear',
    'artisan:optimize',
    'deploy:symlink',
    'deploy:unlock',
    'cleanup',
]);
