SbifApiBundle
=============

Este bundle para Symony 2 permite el acceso a los Reportes Bancarios e Indicadores Financieros proveídos por la
Superintendencia de Bancos e Instituciones Financieras de Chile a través de su [API](http://api.sbif.cl).

Para utilizar este bundle, usted primeramente deberá obtener una [API Key](http://api.sbif.cl/uso-de-api-key.html).  

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

### C) Configure el Bundle

```yaml
# app/config/config.yml
sbif_api:
    api_key: ""
```

Uso
---

### B) Indicadores


```php
$sbifApi = $this->get('cosmos_app.sbif_api');

$sbifApi->getUsd(); // Servicio Dólar Americano (USD)
$sbifApi->getEur(); // Servicio Euro (EUR)
$sbifApi->getIpc(); // Servicio Indice de Precios al Consumidor (IPC)
$sbifApi->getTmc(); // Servicio Tasa de Interés Máxima Convencional (TMC)
$sbifApi->getTab(); // Servicio Tasa TAB UF 360 días (TAB)
$sbifApi->getUf();  // Servicio Unidad de Fomento (UF)
$sbifApi->getUtm(); // Servicio Unidad Tributaria Mensual (UTM)

$value = $sbifApi->getUsd()->getByDate(\DateTime $date = null);
$value = $sbifApi->getUsd()->getByMonth($year, $month);
$value = $sbifApi->getUsd()->getByYear($year);

$value = $sbifApi->getUsd()->getAfterDate(\DateTime $date);
$value = $sbifApi->getUsd()->getAfterMonth($year, $month);
$value = $sbifApi->getUsd()->getAfterYear($year);

$value = $sbifApi->getUsd()->getBeforeDate(\DateTime $date);
$value = $sbifApi->getUsd()->getBeforeMonth($year, $month);
$value = $sbifApi->getUsd()->getBeforeYear($year);

$value = $sbifApi->getUsd()->getBetweenDates(\DateTime $dateSince, \DateTime $dateUntil);
$value = $sbifApi->getUsd()->getBetweenMonths($yearSince, $monthSince, $yearUntil, $monthUntil);
$value = $sbifApi->getUsd()->getBetweenYears($yearSince, $yearUntil);
```

Licencia
--------

[Licencia](LICENSE)
