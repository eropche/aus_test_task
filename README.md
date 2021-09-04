# aus_test_task

git clone
create my.env from .env
docker-compose up -d
sudo chown -R 33:33 ${PWD?} && sudo chmod -R a=,ug=rwX,o=rX,g+s ${PWD?}
bash scripts/php-fpm_bash.sh
composer install
bin/console doctrine:mi:mi

project is build

run command in container
bin/console random_user:generate

200 customers added

routes:
http://localhost:8001/customers
http://localhost:8001/customers/id
