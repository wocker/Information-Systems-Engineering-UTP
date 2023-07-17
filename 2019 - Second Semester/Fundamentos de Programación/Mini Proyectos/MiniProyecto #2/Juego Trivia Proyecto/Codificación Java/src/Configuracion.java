import java.util.Scanner;
public class Configuracion {
    private int opcionPrimeraConfiguracion;
    private String enunciado, posible1, posible2, posible3, correcta;
    private int puntos;

    public int MostrarOpciones(){
        Scanner sc = new Scanner(System.in);
        System.out.println("\n1 - Añadir pregunta");
        System.out.println("2 - Modificar pregunta");
        System.out.println("3 - Eliminar pregunta");
        System.out.println("4 - Regresar");
        System.out.print("Ingrese su opción: ");
        opcionPrimeraConfiguracion = sc.nextInt();
        return opcionPrimeraConfiguracion;
    }

    public Object[] EvaluarOpciones(int opcionPrimeraConfiguracion) {
        int posib, espacio;
        Configuracion preg[] = new Configuracion[15];
        String enun, pos1, pos2, pos3, corr;
        int punt;
        Scanner sc = new Scanner(System.in);
        posib = opcionPrimeraConfiguracion;
        while(posib != 4) {
            switch(posib) {
                case 1:
                    System.out.print("\nIngrese el numero de la pregunta: ");
                    espacio = sc.nextInt();
                    sc.nextLine();
                    preg[espacio] = new Configuracion();
                    System.out.print("Ingrese la pregunta: ");
                    preg[espacio].enunciado = sc.nextLine();
                    System.out.print("Ingrese las posibles respuestas: ");
                    preg[espacio].posible1 = sc.nextLine();
                    System.out.print("Ingrese la segunda posible: ");
                    preg[espacio].posible2 = sc.nextLine();
                    //sc.next();
                    System.out.print("Ingrese las tercera posible: ");
                    preg[espacio].posible3 = sc.nextLine();
                    //sc.next();
                    System.out.print("Ingrese la respuesta correcta: ");
                    preg[espacio].correcta = sc.nextLine();
                    //sc.next();
                    System.out.print("Ingrese el puntaje de la respuesta correcta: ");
                    preg[espacio].puntos = sc.nextInt();
                    //pos1 = preg[espacio].getPosible1();
                    //System.out.printf("%s", pos1);
                    //preg[espacio] = Configuracion(enun, pos1, pos2, pos3, corr, punt);
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
            posib = MostrarOpciones();
        }
        return preg;
    }

    public Configuracion(){
        enunciado = "";
        posible1 = "";
        posible2 = "";
        posible3 = "";
        correcta = "";
        puntos = 0;
    }

    public Configuracion(String enun, String pos1, String pos2, String pos3, String corr, int punt){
        enunciado = enun;
        posible1 = pos1;
        posible2 = pos2;
        posible3 = pos3;
        correcta = corr;
        puntos = punt;
    }
    
    public String getEnunciado(){
        return enunciado;
    }

    public String getPosible1(){
        return posible1;
    }

    public String getPosible2(){
        return posible2;
    }

    public String getPosible3(){
        return posible3;
    }

    public String getCorrecta(){
        return correcta;
    }

    public int getPuntos(){
        return puntos;
    }

}
