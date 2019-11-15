@servers(['web' => ['root@159.65.168.219']])

@task('deploy', ['on' => 'web'])
    ls -al
@endtask
