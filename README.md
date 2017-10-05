# WebUpload

Este é um projeto open source, livre de restrinções e regido por uma licencá [MIT](./license).

> **Nota**: Não possuimos responsabilidade de suporte ou reparação de qualquer natureza em razão de uso indevido ou inadequado de qualqeur natureza.

Está biblioteca segue os padrões descritos na [PSR-2](http://www.php-fig.org/psr/psr-2/), logo, isso implica que a mesma está em conformidade com a [PSR-1](http://www.php-fig.org/psr/psr-1/).

As palavras-chave "DEVE", "NÃO DEVE", "REQUER", "DEVERIA", "NÃO DEVERIA", "PODERIA", "NÃO PODERIA", "RECOMENDÁVEL", "PODE", e "OPCIONAL" neste documento devem ser interpretadas como descritas no [RFC 2119](http://tools.ietf.org/html/rfc2119). Tradução livre [RFC 2119 pt-br](http://rfc.pt.webiwg.org/rfc2119).

1. [Referências](#referencia)
1. [Funcionalidades](#funcionalidades)
1. [Proposta do projeto](#proposta_projeto)
1. [Instalação](#instalacao)
    1. [Download via Github](#git_clone)
    1. [Via Composer](#composer)
1. [Configuração final](#configuracao_final)
1. [Licença](#licenca)

## 1 - <a id="referencias"></a>Referências
 - [PSR-1](http://www.php-fig.org/psr/psr-1/)
 - [PSR-2](http://www.php-fig.org/psr/psr-2/)
 - [RFC 2119](http://tools.ietf.org/html/rfc2119). Tradução livre [RFC 2119 pt-br](http://rfc.pt.webiwg.org/rfc2119)

## 2 - <a id="funcionalidades"></a>Funcionalidades
- [x] Autenticação de usuário
- [x] Recuperação de senha por email 
- [x] Gerenciamento de arquivos (upload, download, exclusão e página com detalhes do arquivo)
- [x] Organização de arquivos (sistema de tags)
- [x] Dashboard (total de arquivos, total de tags, total de usuários...)
- [x] Painel de preferências de sistema (com acesso restrito ao user master)

## 3 - <a id="proposta_projeto"></a>Proposta do projeto

Este projeto foi desenvolvido para auxiliar professores, tutores e demais pessoas a centralizarem o recebimento de arquivos, para isso basta criar uma tag (equivale a uma categoria ou assunto) e passar para os envolvidos, estes utilizarão a tag em questão para fazer upload direcionados de arquivo.

## 4 - <a id="instalacao"></a>Instalação

Segue abaixo as formas como você pode proceder para instalar este projeto.

### 4.1 - <a id="git_clone"></a>Download via Github

Após o download dos fontes. Acesse o diretório descarregado e execute o comando abaixo para descarregar as dependências:

```
composer install
```
Caso ainda não tenha o composer instalado, obtenha este em: https://getcomposer.org/download/

Para criar o arquivo de configuração e posteriormente gera uma chave:

```
cp .env.example .env
php artisan key:generate
```

### 4.2 - <a id="composer"></a>Via Composer

Para criar um projeto execute:

```
composer create-project --prefer-dist fabiojaniolima/webupload
```

caso seu ambiente seja produtivo, opcionalmente você pode fazer uma listanação limpa, ou seja, sem pacotes para ambiente de desenvolvimento:

```
composer create-project --prefer-dist fabiojaniolima/webupload --no-dev
```

## 5 - <a id="configuracao_final"></a>Configuração final

Inicialmente você deve informar os dados de acesso ao banco no arquivo **.env** presente na raiz do projeto.

Posteriormente a configuração do banco de dados você deve executar o comando abaixo dentro do diretório do projeto:
```
php artisan migrate
```

Pronto, agora abra o navegador e acessa sua aplicação.

## 6 - <a id="licenca">Licença MIT
Para maiores informações, leia o arquivo de licença disponibilizado com este projeto.