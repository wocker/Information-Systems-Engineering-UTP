import java.util.ArrayList; // The ArrayList library
import java.util.Collections;
import java.util.Iterator; // The Iterator Library
import java.util.Arrays; // The Arrays Library
import java.util.List;
import java.util.Scanner;
import javax.swing.*;

public class Trivia {
  //Declaracion para el arreglo
  Pregunta question = new Pregunta();
  Pregunta[] preg = new Pregunta[15];
  Scanner sc = new Scanner(System.in);
  //Declaracion de variables
  int eleccionMenu;
  public String enunciado, posible1, posible2, posible3, correcta;
  public int puntos;
  public int contadorUsuario = 0;
  int puntaje[] = new int[15];
  String usuario[] = new String[15];
  char jugar = '1';
  int espacio, responder, respuesta;
  char intento[] = new char[15];


  // METODOS DEL MENU PRINCIPAL (000)
  public void ImprimirPantallaPrincipal() {
    System.out.println("\n---------------------------------------");
    System.out.println("           JUEGO DE TRIVIA");
    System.out.println("1 - Configuracion");
    System.out.println("2 - Juego");
    System.out.println("3 - Consulta de Puntajes Obtenidos");
    System.out.println("4 - Salir");
    System.out.println("---------------------------------------");
  }
  public int ConsultarOpcionPrincipal() {
    System.out.print("Inserte una opción: ");
    eleccionMenu = sc.nextInt();
    return eleccionMenu;
  }
  public int EvaluarOpcionPrincipal() {
    switch (eleccionMenu) {
      case 1:
        int primeraConsulta;
        primeraConsulta = MostrarOpciones();
        while (primeraConsulta != 4) {
          EvaluarOpcionConfiguracion(primeraConsulta);
          primeraConsulta = MostrarOpciones();
        }
        break;
      case 2:
        jugar = '1';
        DefinirUsuario();
        InicializarArreglo();
        while(jugar == '1'){
          MostrarPreguntas();
          try{
            SeleccionarPregunta();
            if(intento[responder] != 's'){
              EvaluarPregunta();
              AcumularPuntaje();
            }
            else{
              System.out.println("Ya respondiste esta pregunta");
            }
            SeguirJugando();
          }
          catch(NullPointerException a){
            System.out.println("(!) No hay pregunta");
          }
        }
        contadorUsuario ++;
        break;
      case 3:
        ImprimirPuntajes();
        break;
      default:
        System.out.println("Seleccione una opción válida");
        break;
    }
    ImprimirPantallaPrincipal();
    ConsultarOpcionPrincipal();
    return eleccionMenu;
  }
  // METODOS DEL MENU DE CONFIGURACION (001)
  public int MostrarOpciones() {
    int opcionConfiguracion;
    Scanner sc = new Scanner(System.in);
    System.out.println("\n----------------------------------------------------");
    System.out.println("                  CONFIGURACION ");
    System.out.println("1 - Añadir pregunta");
    System.out.println("2 - Modificar pregunta");
    System.out.println("3 - Eliminar pregunta");
    System.out.println("4 - Regresar");
    System.out.println("----------------------------------------------------");
    System.out.print("Ingrese su opción: ");
    opcionConfiguracion = sc.nextInt();
    return opcionConfiguracion;
  }
  public void EvaluarOpcionConfiguracion(int primeraConsulta) {
    switch (primeraConsulta) {
      case 1:
        System.out.print("\nIngrese el numero de la pregunta: ");
        espacio = sc.nextInt();
        sc.nextLine();
        preg[espacio] = new Pregunta();
        System.out.print("Ingrese la pregunta: ");
        enunciado = sc.nextLine();
        System.out.print("Ingrese las primera incorrecta: ");
        posible1 = sc.nextLine();
        System.out.print("Ingrese la segunda incorrecta: ");
        posible2 = sc.nextLine();
        System.out.print("Ingrese las tercera incorrecta: ");
        posible3 = sc.nextLine();
        System.out.print("Ingrese la respuesta correcta: ");
        correcta = sc.nextLine();
        System.out.print("Ingrese el puntaje de la respuesta correcta: ");
        puntos = sc.nextInt();
        preg[espacio] = new Pregunta(enunciado, posible1, posible2, posible3, correcta, puntos);
        break;
      case 2:
        MostrarPreguntas();
        System.out.print("\nIngrese el numero de la pregunta: ");
        espacio = sc.nextInt();
        sc.nextLine();
        preg[espacio] = new Pregunta();
        System.out.print("Ingrese la pregunta: ");
        enunciado = sc.nextLine();
        System.out.print("Ingrese las primera incorrecta: ");
        posible1 = sc.nextLine();
        System.out.print("Ingrese la segunda incorrecta: ");
        posible2 = sc.nextLine();
        System.out.print("Ingrese las tercera incorrecta: ");
        posible3 = sc.nextLine();
        System.out.print("Ingrese la respuesta correcta: ");
        correcta = sc.nextLine();
        System.out.print("Ingrese el puntaje de la respuesta correcta: ");
        puntos = sc.nextInt();
        preg[espacio] = new Pregunta(enunciado, posible1, posible2, posible3, correcta, puntos);
        break;
      case 3:
        System.out.println("Seleccione la pregunta a eliminar: ");
        MostrarPreguntas();
        espacio = sc.nextInt();
        System.arraycopy(preg, espacio + 1, preg, espacio, preg.length - 1 - espacio);
        MostrarPreguntas();
        break;
      default:
        System.out.println("\n(!) Seleccione una opción válida");
    }
  }

  public void InicializarArreglo() {
    for(int i=0; i < intento.length; i++){
      intento[i] = 'n';
    }
  }


  // METODOS DEL MENU DE JUEGO (002)
  public void DefinirUsuario(){
    System.out.print("Ingrese su nombre de usuario: ");
    usuario[contadorUsuario] = sc.next();
    sc.nextLine();
  }
  public void MostrarPreguntas(){
    System.out.println("----------------------------------------------------");
    for(int i =0; i < preg.length; i++){
      try{
        System.out.printf("%d. ¿%s?\n", i, preg[i].getEnunciado());
      }
      catch (NullPointerException e){
      }
    }
    System.out.println("----------------------------------------------------");
  }
  public void SeleccionarPregunta(){
    System.out.print("Pregunta que quiere responder: ");
    responder = sc.nextInt();
  }
  public void EvaluarPregunta(){
    System.out.println("\n----------------------------------------------------");
    System.out.printf("Pregunta: %s\n", preg[responder].getEnunciado());
    System.out.println("Sus opciones: ");
    System.out.printf("1 - %s\n", preg[responder].getPosible2());
    System.out.printf("2 - %s\n", preg[responder].getPosible1());
    System.out.printf("3 - %s\n", preg[responder].getCorrecta());
    System.out.printf("4 - %s\n", preg[responder].getPosible3());
    System.out.println("-------------------------------------------------------");
    System.out.print("Su respuesta es: ");
    respuesta = sc.nextInt();
  }
  public void AcumularPuntaje(){
    if(respuesta == 3){
      puntaje[contadorUsuario] = puntaje[contadorUsuario] + preg[responder].getPuntos();
      System.out.printf("\n(✔) Respuesta correcta, sumaste %d puntos\n", preg[responder].getPuntos());
      intento[responder] = 's';
    }
    else{
      System.out.println("\n(!) Te equivocaste");
    }
  }
  public void SeguirJugando(){
    System.out.print("Presiona 1 para continuar o 0 para salir: ");
    jugar = sc.next().charAt(0);
  }

  // METODOS DEL MENU DE PUNTAJE (003)
  public void ImprimirPuntajes(){
    System.out.println("\nUSUARIO                       PUNTAJE");
    for (int i = 0; i < usuario.length; i++) {
      try {
        if(usuario[i] != null){
          System.out.printf("%s                           %d\n", usuario[i], puntaje[i]);
        }
      } catch (NullPointerException e) {
      }
    }
  }

  // Funcion main
  public static void main(String args[]) {
    // Declaracion de variables
    int opcionPrincipal;
    Scanner sc = new Scanner(System.in);
    Trivia tri = new Trivia();

    // Ejecucion y llamados
    tri.ImprimirPantallaPrincipal();
    opcionPrincipal = tri.ConsultarOpcionPrincipal();
    while (opcionPrincipal != 4) {
      opcionPrincipal = tri.EvaluarOpcionPrincipal();
    }
    System.out.println("Hasta luego, gracias por jugar");
  }
}
