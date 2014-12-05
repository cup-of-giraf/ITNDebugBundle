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

Tests
------

Pour lancer les tests:

```
vendor/bin/phpunit
```
