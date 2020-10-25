<?php
namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'portfolio');

// Project repository
set('repository', 'git@github.com:IwThPh/personal-website-v3.git');

//PHP Bin
set('bin/php', '/usr/local/bin/php');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true); 

// Shared files/dirs between deploys 
add('shared_files', []);
add('shared_dirs', []);

// Writable dirs by web server 
add('writable_dirs', []);


// Hosts

host('iwanphillips.dev')
	->user('iwanp')
	->stage('live')
	->set('branch', 'live')
    ->set('deploy_path', '~/{{application}}');    
    
// Tasks

// Hack the laravel recipe to prevent it from calling the now defunct optimize method
task('artisan:optimize',function () {});

desc('Local checkout.');
task('local_checkout', function() {
	$branch = get('branch');
	writeln('Checking out the '. $branch. ' branch.');
	runLocally('git checkout ' . $branch);
	writeln('Done.');
})->once();

desc('Run NPM.');
task('run_npm', function() {
	writeln('Running npm install');
	run('npm install');
	writeln('Done.');

	writeln('Running npm run production');
	run('npm run production');
	writeln('Done.');
})->local();

desc('Compile the assets locally before we upload them.');
task('compile_assets', [
	'local_checkout',
	'run_npm'
]);

desc('Run phpunit tests');
task('phpunit:run', function () {
	cd(__DIR__);
	run('php vendor/bin/phpunit');
})->local();

desc('Upload our compiled assests to the server');
task('upload_assets', function () {
	upload(__DIR__ . '/public/css', '{{release_path}}/public');
	upload(__DIR__ . '/public/js', '{{release_path}}/public');
	upload(__DIR__ . '/public/mix-manifest.json', '{{release_path}}/public');
});


// Build

before('deploy', 'phpunit:run');

task('build', function () {
    run('cd {{release_path}} && build');
});

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Locally compile the assets before uploading them.
before('deploy', 'compile_assets');

// Upload asset dirs before symlink new release.
before('deploy:symlink', 'upload_assets');

// Migrate database before symlink new release.
before('deploy:symlink', 'artisan:migrate');

