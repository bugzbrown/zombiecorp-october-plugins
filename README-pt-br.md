# zombiecorp-october-plugins

Plugins para o October CMS

Os plugins deste repostório são:

## SupportJS

Eu uso diversos scripts de Javascript em meus projetos, tanto no site para o cliente como no backend. Por usar ferramentas de build, eu geralmente juntava tudo nos meus builds (quem trabalha em agência/produtora sabe q tempo é um luxo que não nos compete) para economizar tempo.

Eu estou lentamente convertendo meus scripts para funcionar de forma independente e compacta. Eles serão carregados tanto no CMS como no Backend do October, podendo ser usados de forma transparente, apenas instalando este plugin.

A idéia destes JS é que eles tenham o menor footprint e sejam o mais independentes possíveis (sem depender de bibliotecas externas e afins).

### Version 1.0.1

Na primeira versão, eu converti meu plugin de mascaras de input. Tipo o jQueryMask.

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

Vou adicionar novas funcionalidades a medida que for criando novas mascaras...

## Ceps

Consulta de cep. Embora seja simples, o processo guarda uma cópia local dos ceps previamente consultados, evitando assim uma custosa viagem ao servidor externo.

Em desenvolvimento ainda, o plugin permitrá o uso de componentes para rapidamente adicionar a consulta de CEP em um formulário. Já que os dados ficam armazenados localmente, você precisa só armazenar o CEP, número e complemento em sua tabela do formulário, já que os demais campos podem ser buscados via relationships.

Quando estiver pronto eu coloco alguns exemplos aqui.
