=== Typeform Webhooks Helper ===
License: GPL-2.0+
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Contributors: deliciousbrains, wpengine, elliotcondon, lgladdy, mindctrl, rfmeier, andrewbotz, modernnerd, antpb, mattshaw
Donate link: https://paypal.me/cuxaro
Tags: ACF, TypeForm, Webhook, Advanced Custom Field
Tested up to: 6.1
Requires at least: 5.9
Requires PHP: 7.1
Stable tag: 1.0.0

Plugin para conectar Typeform con WordPress de una forma fácil mediante Webhooks. 

El plugin permite acogerse a una action hooks para poder personalizarse y ejecutar cualquier código desde otro plugin o theme.

Este plugin contiene código incrustado de [Advanced Custom Fields](https://wordpress.org/plugins/advanced-custom-fields/) que está permitido según su página web [disclainer](https://www.advancedcustomfields.com/resources/including-acf-within-a-plugin-or-theme/). 
Gracias al equipo de ACF por este gran proyecto que tanto nos ayuda a los desarrolladores.


= Funcionalidades =

* Generación dinámica e ilimitada de tantos endpoints como sea necesario
* Guardar la información de todas las respuestas (de forma opcional)
* Segurizar las respuestas mediante secret para asegurar que la respuesta venga realmente desde Typeform
* Trabajo con Action Hooks y Filter Hooks para extender y personalizar todos los parametros


== Frequently Asked Questions ==

= ¿Qué hooks tiene disponible? =

**Action Hooks**

* `tfwh_new`: Enviar el WP_Rest_Request y el WP_Post

**Filter Hooks** 

* `tfwh_cpt_labels`: Personalizar los labels del CPT
* `tfwh_cpt_args`: Personalizar los args del CPT
* `tfwh_acf_fields_options`: Personalizar los fields del Advanced Custom Field
* `tfwh_namespace`: Personalizar el namespace del register_rest_route
* `tfwh_rest_url_base`: Personalizar la tfwh_rest_url_base
* `tfwh_route`: Personalizar la route del register_rest_route
* `tfwh_url_endpoint`: Personalizar el endpoint de register_rest_route


== Changelog ==

= 1.0.0 - 2022-22-05 = 

Primera versión


== Screenshots ==

1. Panel vacio.
1. Panel lleno.
1. Listado de webhooks.
