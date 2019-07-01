# Masks

O arquivo principal do Masks mora em `ts/Masks/Mask.js`.

Para adicionar novas funcionalidades, basicamente crie novas funcões privadas dentro deste arquivo.

## Explicação

As mascaras são criadas usando regular expressions nos campos do formulário com o atributo zc-mask. O plugin verifica todos os campos que possuem esse atributo e busca o valor deste atributo, verificando se existe uma função para para ele. Se houver, ele monitora os inputs, chamando a função toda vez q o campo muda.

### Exemplo com CEP

Para exemplificar, quando vc colocar um atributo `zc-mask="cep"` em seu input, o script buscara no código JS por uma função `cep` (dentro do escopo do objeto).

A função cep nada mais é do que um regular expression:

```typescript
    private cep( value:string ) {
		return value
			.replace(/\D/g,'')
			.replace(/(\d{5})(\d)/,'$1-$2')
			.replace(/(-\d{3})\d+?$/,'$1')
    }
```
