#include <iostream>
#include <stdlib.h>
#include <stdio.h>
#include <string.h>
#include <conio.h>
#include <stddef.h>

using namespace std;

//Declaração de Funções
void menu();

int main(){

  int x, seq = 1, pos = 0, i = 0;

  menu();

  int idLivro = 0;
  string nomeAutor;
  string nomeLivro;
  string nomeEditora;

//Declara struct
  typedef struct{
    int idLivro;
    string nomeAutor;
    string nomeLivro;
    string nomeEditora;
  } Livro;
  Livro livros[5];

  do {
    x = 0;
    cin >> x;
    system("cls");

    switch(x){
      case 1:

        if(i >= 5){
          cout << "ERRO: Sistema de cadastro lotado.\n";
          cout << "Nao e possivel armazenar mais informacoes!\n\n";
          system("PAUSE");
          system("cls");
          menu();
        }

        if(livros[i].nomeAutor != " " && i < 5){
          fflush(stdin);
          cout << "______________________________________\n";
          cout << "Informe o nome do Autor:   ";
          cin >> nomeAutor;
          cout << "Informe o nome do Livro:   ";
          cin >> nomeLivro;
          cout << "Informe o nome da Editora: ";
          cin >> nomeEditora;
          cout << "______________________________________\n";

          livros[i] = {seq, nomeAutor, nomeLivro, nomeEditora };
          cout << "\n\n_____________________";
          cout << "\n Cod:     " << livros[i].idLivro;
          cout << "\n Autor:   " << livros[i].nomeAutor;
          cout << "\n Livro:   " << livros[i].nomeLivro;
          cout << "\n Editora: " << livros[i].nomeEditora;
          cout << "\n_____________________";
          cout << "\n\n";
          seq = seq+1;
          pos++;
          i++;
          system("PAUSE");
          system("cls");
          menu();
        }
        else{
          system("cls");
          menu();
        }
      break;

      case 2:
        for(i=0; i<pos; i++){
          cout << "\n\n________________________________";
          cout << "\n Cod:     " << livros[i].idLivro;
          cout << "\n Autor:   " << livros[i].nomeAutor;
          cout << "\n Livro:   " << livros[i].nomeLivro;
          cout << "\n Editora: " << livros[i].nomeEditora;
          cout << "\n________________________________\n";
        }
        menu();
      break;

      case 0:
        exit(0);
      break;

      default:
        cout << ("ERRO: Opcao invalida\n");
        system("PAUSE");
        system("cls");
        menu();
    }
  } while ( x != 0 );
return 0;
}
// Funções
void menu(){
    cout << ("_____________________\n");
    cout << ("| 1 - Inserir Livro |\n");
    cout << ("| 2 - Listar Livros |\n");
    cout << ("| 0 - Sair          |\n");
    cout << ("|___________________|\n");
}
