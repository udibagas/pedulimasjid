@servers(['salwa' => 'root@salamdakwah.com'])

@task('pull', ['on' => ['salwa'], 'confirm' => false])
    cd /home/pedulimasjid/public_html
    git pull
    php artisan migrate
@endtask

@task('up', ['on' => ['salwa'], 'confirm' => false])
    cd /home/pedulimasjid/public_html
    php artisan up
@endtask

@task('down', ['on' => ['salwa'], 'confirm' => false])
    cd /home/pedulimasjid/public_html
    php artisan down
@endtask
