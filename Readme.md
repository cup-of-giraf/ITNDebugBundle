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
        debug/url: une url de debug
```

Tests
------

Pour lancer les tests:

```
vendor/bin/phpunit
```