@servers(['web'=>['-i ~/.ssh/cerve deploy@165.232.182.160']])

@setup
    $dir="/var/www/html/careermove.co.ke"
@endsetup

@story('full-deploy')
site-down
git
backend
frontend
site-up

@endstory

@story('backend-deploy')
site-down
git
backend
site-up
@endstory

@story('frontend-deploy')
site-down
git
frontend
site-up
@endstory

@task('site-down')
    cd {{$dir}}
    php artisan down
@endtask

@task('git')
    cd {{$dir}}

    git pull
@endtask

@task('backend')
    cd {{$dir}}
    composer install --no-dev --no-interaction --no-plugins --no-scripts --no-progress  --optimize-autoloader
    php artisan migrate --force
    php artisan cache:clear
    php artisan config:cache

@endtask

@task('frontend')
    cd {{$dir}}
    source ~/.nvm/nvm.sh
    npm install --production
    

@endtask

@task('site-up')
    cd {{$dir}}
    php artisan up
@endtask
