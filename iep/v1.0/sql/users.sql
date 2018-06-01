
DROP USER IF EXISTS `iep`@`localhost`;

CREATE USER `iep`@`localhost`;

GRANT SELECT, INSERT, UPDATE, DELETE, EXECUTE, REFERENCES ON iep.* TO `iep`@`localhost`;

SET PASSWORD FOR 'iep'@'localhost' = PASSWORD('#include <iostream> using namespace std; int main(int argc, char *argv[]) { cout << "Hello World";}');