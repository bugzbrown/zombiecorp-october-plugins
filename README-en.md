# zombiecorp-october-plugins

October CMS plugins I am developing or have developed.

These plugins are to be used in OctoberCMS.

The plugins are:

## SupportJS

I use a number of custom Javascript files routinely both in client and in the administration side of projects.

I am slowly converting these into a neat little bundle that will be included in projects when this plugin is installed.

### Version 1.0.1

This is the first release of the bundle and currently I only have a simple input masking JS. It basically allows you to mask inputs from the user in similar fashion to jQuery's Mask Plugin, though, it requires no JS from your part.

Simply load and enable the plugin, then add an attribute to you input file like so.

```html
<input zcmask="NAME_OF_MASK_FUNCTION" type="text" />
```

The plugin currently supports a number of functions I use the most in my projects. These are as follows:

- cep - used for brazilian Zip Codes - format `00000-000`
- telefone - used for brazilian phone number with flexible format for mobile phones - `(00) 00000-0000 / (00) 0000-0000`
- telefonefixo - used for brazilian phone number - `(00) 0000-0000`
- cnpj - Brazilian Company registration number - `000.000.000\0000-00`
- cpf - Brazilian personal registration number - `000.000.000-00`

As I add new masks, I will be updating this plugin, and, as it grows, I might actually split this plugin into it's own repository.


## Ceps

Zipcodes in brazil are called CEP. There is a public lookup service that allows you to fetch an address by supplying a service. This is usually a simple process, but it is quite boring to implement every time.
The idea behind this plugin is to make a couple of widgets/components that will allow you to quickly add CEP lookups into your applications without having too much to worry about.
