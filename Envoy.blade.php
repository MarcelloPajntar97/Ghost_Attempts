@servers(['web' => ['root@206.81.3.118']])

@task('deploy', ['on' => 'web'])
    ls -al
@endtask
