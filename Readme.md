ITNDebugBundle
=============


Ce bundle permet de définir une liste d'url de debug à afficher dans la debug toolbar de symfony

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
        debug/url: My debug feature
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
