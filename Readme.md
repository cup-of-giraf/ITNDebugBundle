ITNDebugBundle
=============

Ce bundle permet de définir une liste d'url de debug à afficher dans la debug toolbar de symfony.

Le but de ce bundle est de simplifier l’accès aux URL que vous utilisez fréquemment pour chaque projet en les mettant dans la debug toolbar de symfony.

Installation
--------------

```
composer install
```

Configuration
--------------

 - Ajoutez le bundle dans votre AppKernel
 - configurez le bundle:

``` yaml
itn_debug:
    urls:
        #your/url: Your link label
        http://ci.gitlab.com/my-project: continuous integration server
        /queues: information about queues status
```

Si vous voulez que les urls de debug appartenant à l'application ne soient pas protégées par le firewall du security bundle:
``` yaml
itn_debug:
    secure_url: false
```

**ATTENTION: si vous mettez cette option à false, assurez vous que le bundle n'est chargé qu'en environement de dev.**

Tests
------

Pour lancer les tests:

```
vendor/bin/phpunit
```
