import java.util.Scanner;

public class Pantalla_Principal {
    // Declaracion de variables
    public String usuarios[];
    public int puntaje[];
    public static Object preguntas[] = new Object[15];
    public String respuesta[];
    public String opciones[];

    public static void ImprimirPantalla() {
        System.out.println("---------------------------------------");
        System.out.println("           JUEGO DE TRIVIA");
        System.out.println("1 - Configuracion");
        System.out.println("2 - Juego");
        System.out.println("3 - Consulta de Puntajes Obtenidos");
        System.out.println("4 - Salir");
        System.out.println("---------------------------------------");
    }

    // lee la respuesta del usuario y procede a seleccionarmenu
    public static int LeerRespuesta() {
        Scanner sc = new Scanner(System.in);
        System.out.print("Inserte una opción: ");
        int respuesta = sc.nextInt();
        return respuesta;
    }

    public String getEnunciado() {
        return enunciado;
    }

    // Ctrl + Shift + I
    public static void EvaluarRespuesta(int respuesta) {
        //String ask;
        while (respuesta != 4) {
            switch (respuesta) {
            case 1:
                int puente;
                Configuracion config = new Configuracion(); // Crea el objeto de la clase segun la opcion
                puente = config.MostrarOpciones();
                preguntas = config.EvaluarOpciones(puente);
                //ask = preguntas[1].getEnunciado;
                break;
            case 2:
                Juego juego = new Juego();
                juego.imprimirHola();
                break;
            case 3:
                Consulta_Puntajes consulta = new Consulta_Puntajes();
                consulta.imprimirPantalla();
                break;
            default:
                System.out.println("\n(!) Seleccione una opción válida");
                break;
            }
            ImprimirPantalla();
            respuesta = LeerRespuesta();
        }
        System.out.println("Hasta luego, gracias por jugar");

    }

    public static void main(String[] args) {
        // Declaracion de variables
        Scanner sc = new Scanner(System.in);
        int opcionPrincipal;
        // Llamado a los metodos
        ImprimirPantalla();
        opcionPrincipal = LeerRespuesta();
        EvaluarRespuesta(opcionPrincipal);

        sc.close();
    }
}
