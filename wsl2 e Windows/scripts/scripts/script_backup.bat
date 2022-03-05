@echo off

cls
echo Realmente quer fazer backup? CRTL + C para parar
pause

echo ok, fazendo backup...
cd "C:\Users\Asus\Documents\PycharmProjects\Linux\wsl2 e Windows\scripts"
mkdir backup

Xcopy /e /y "C:\Users\Asus\Documents\Excel\Curso de Excel\Graficos dados na aula" "C:\Users\Asus\Documents\PycharmProjects\Linux\wsl2 e Windows\scripts\backup"

echo Listando os arquivos do backup
dir C:\Users\Asus\Documents\PycharmProjects\Linux\"wsl2 e Windows"\scripts\backup