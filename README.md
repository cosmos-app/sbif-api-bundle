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
$values = $sbifApi->getUsd()->getByMonth($year, $month);
$values = $sbifApi->getUsd()->getByYear($year);

$values = $sbifApi->getUsd()->getAfterDate(\DateTime $date);
$values = $sbifApi->getUsd()->getAfterMonth($year, $month);
$values = $sbifApi->getUsd()->getAfterYear($year);

$values = $sbifApi->getUsd()->getBeforeDate(\DateTime $date);
$values = $sbifApi->getUsd()->getBeforeMonth($year, $month);
$values = $sbifApi->getUsd()->getBeforeYear($year);

$values = $sbifApi->getUsd()->getBetweenDates(\DateTime $dateSince, \DateTime $dateUntil);
$values = $sbifApi->getUsd()->getBetweenMonths($yearSince, $monthSince, $yearUntil, $monthUntil);
$values = $sbifApi->getUsd()->getBetweenYears($yearSince, $yearUntil);
```

Licencia
--------

MIT License

Copyright (c) 2018 Héctor Rojas <hector.d.rojas.s@gmail.com>

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
