# Release Notes

## v1.2.0 (2017-10-05)

### Added
- Resintrção no acesso as Preferências de Sistema (somente o usuário master id=1 terá acesso)
- Página customizada para o erro HTTP 403 (Forbidden)
- Página com detalhes do arquivo (Título, extensão, tamanho, hash...)

### Changed
- Cor da fonte
- Rota para preferência de sistemas


## v1.1.0 (2017-10-04)

### Added
- /painel/preferencias
  - Funcionalidade para ativar e desligar auto-registro

### Changed
- Caso não seja atribuido um título personalizado no upload será considerado o nome do arquivo
- As Tags serão salvas em uppercase (maiúsculo)
- O tamanho máximo para Título de arquivos foi alterado de 30 para 50 caracteres
- Cor das fontes e dos placeholder

### Fixed
- Nome de alguns input em resource/views/upload.blade.php


## v1.0.0 (2017-10-03)

### Added
- /
  - Funcionalidade para upload de arquivos
- /painel 
  - Download e exclusão de arquivos
  - Criação, edição e exclusão de Tags (categorias)
  - Preferências de sistema
  - Funcionalidade para ativar e desligar auto-registro (via código /app/Http/Controllers/Auth/RegisterController.php)