# Zombiecorp Support JS

This plugin adds commonly used JS items to the project in a neat tight little bundle.

## Masks

### Documentação

Maiores informações podem ser encontradas aqui : [Documentação do Masks](./docs/masks.md)
### Português

Tendo instalado o plugin, basta você adicionar um atributo no seu input assim:

```html
<input zcmask="NOME_DA_FUNCAO_DE_MASCARA" type="text" />
```

O plugin atualmente faz mascaras para as seguintes funções:

- cep - formato `00000-000`
- telefone - telefone fixo / celular - `(00) 00000-0000 / (00) 0000-0000`
- telefonefixo - Restringe o formato para telefone fixo - `(00) 0000-0000`
- cnpj - `000.000.000\0000-00`
- cpf - `000.000.000-00`

---

### English

When you need to mask an input, you can now use a declarative way of doing so. All you need to do is include the `zc-mask` attribute to you field.

```html
<input zcmask="MASK_FUNCTION" type="text" />
```

Currently supported are these masks:

- cep - used for brazilian Zip Codes - format `00000-000`
- telefone - used for brazilian phone number with flexible format for mobile phones - `(00) 00000-0000 / (00) 0000-0000`
- telefonefixo - used for brazilian phone number - `(00) 0000-0000`
- cnpj - Brazilian Company registration number - `000.000.000\0000-00`
- cpf - Brazilian personal registration number - `000.000.000-00`
