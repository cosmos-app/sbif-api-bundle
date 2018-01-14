SbifApiBundle
=============

Este bundle para Symony 2 permite el acceso a los Reportes Bancarios e Indicadores Financieros 
proveídos por la [API SBIF](http://api.sbif.cl) Interfaz de Programación de Aplicaciones de la 
Superintendencia de Bancos e Instituciones Financieras de Chile.

- Reportes Bancarios

- Indicadores Financieros

Prerrequisitos
--------------

    php >=5.5.9
    symfony ~2.7.0

Instalación
-----------

### A) Descarge el Bundle

    composer require cosmos-app/sbif-api-bundle:~2.7.0

### B) Habilite el Bundle

```php
// app/AppKernel.php
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            // ...
            new CosmosApp\SbifApiBundle\SbifApiBundle(),
        );

        // ...
    }
}
```

Configuración
-------------

```yaml
# app/config/config.yml
sbif_api:
    api_key: ""
```

Uso
---

```php
$sbifApiDolarService = $this->get('app_cosmos.sbif_api.dolar');
```

Licencia
--------

[Licencia](LICENSE)
