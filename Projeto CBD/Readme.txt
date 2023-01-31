credenciais:
		username:admin123
		password:admin123

		username:funcionario123
		password:funcionario123

		username:utilizador123
		password:utilizador123

Migrations:
	Configuração projeto primeira  vez no PC (rbac +)

	Comandos CMD pasta do projeto:

	composer update (Para atualizar pasta vendor)

	php init (enter) 0 (development) yes 

	php yii migrate : Criação de tabelas user e migration( é preciso ter a base de dados criada e designada no ficheiro common/config/main local)

	php yii migrate --migrationPath=@yii/rbac/migrations (para gerar as tabelas do rbac na base de dados)

	php yii rbac/init (para configurar o rbac)