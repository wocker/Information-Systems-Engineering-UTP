import java.util.Scanner;
import java.util.ArrayList;

public class Trivia {
    int eleccionMenu;
    //Declaracion para el arreglo
    Pregunta question = new Pregunta();
    Pregunta preg[] = new Pregunta[15];
    //Declaracion de variables
    public String enunciado, posible1, posible2, posible3, correcta;
    public int puntos;


    // METODOS DEL MENU PRINCIPAL
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
        Scanner sc = new Scanner(System.in);
        System.out.println("Inserte una opción: ");
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
                }
                break;
            case 2:
                break;
            case 3:
                break;
            default:
                System.out.println("Seleccione una opción válida");
                break;
        }
        ImprimirPantallaPrincipal();
        ConsultarOpcionPrincipal();
        return eleccionMenu;
    }

    // METODOS DEL MENU DE CONFIGURACION
    public int MostrarOpciones() {
        int opcionConfiguracion;
        Scanner sc = new Scanner(System.in);
        System.out.println("\n1 - Añadir pregunta");
        System.out.println("2 - Modificar pregunta");
        System.out.println("3 - Eliminar pregunta");
        System.out.println("4 - Regresar");
        System.out.print("Ingrese su opción: ");
        opcionConfiguracion = sc.nextInt();
        return opcionConfiguracion;
    }

    public void EvaluarOpcionConfiguracion(int primeraConsulta) {
        Scanner sc = new Scanner(System.in);
        int espacio;
        switch (primeraConsulta) {
            case 1:
                System.out.print("\nIngrese el numero de la pregunta: ");
                espacio = sc.nextInt();
                sc.nextLine();
                preg[espacio] = new Pregunta();
                System.out.print("Ingrese la pregunta: ");
                enunciado = sc.nextLine();
                System.out.print("Ingrese las posibles respuestas: ");
                posible1 = sc.nextLine();
                System.out.print("Ingrese la segunda posible: ");
                posible2 = sc.nextLine();
                System.out.print("Ingrese las tercera posible: ");
                posible3 = sc.nextLine();
                System.out.print("Ingrese la respuesta correcta: ");
                correcta = sc.nextLine();
                System.out.print("Ingrese el puntaje de la respuesta correcta: ");
                puntos = sc.nextInt();
                preg[espacio] = new Pregunta(enunciado, posible1, posible2, posible3, correcta, puntos);
                break;
            case 2:
                System.out.println("\nIngrese la pregunta:");
                System.out.println("Ingrese las posibles respuestas correctas");
                System.out.println("Ingrese la respuesta correcta");
                System.out.println("Ingrese el puntaje de la respuesta correcta");
                break;
            case 3:
                System.out.println("\nIngrese la pregunta");
                break;
            default:
                System.out.println("\n(!) Seleccione una opción válida");
            }
        primeraConsulta = MostrarOpciones();
    }

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
