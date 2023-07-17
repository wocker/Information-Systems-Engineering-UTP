import java.util.* ;
class Promedio {
    private double parcial1, parcial2, parcial3;
    private String nombre;

    public Promedio(double parcial1, double parcial2, double parcial3, String nombre) {
        this.parcial1 = parcial1;
        this.parcial2 = parcial2;
        this.parcial3 = parcial3;
        this.nombre = nombre;
    }

    public double getParcial1() {
        return parcial1;
    }

    public void setParcial1(double parcial1) {
        this.parcial1 = parcial1;
    }

    public double getParcial2() {
        return parcial2;
    }

    public void setParcial2(double parcial2) {
        this.parcial2 = parcial2;
    }

    public double getParcial3() {
        return parcial3;
    }

    public void setParcial3(double parcial3) {
        this.parcial3 = parcial3;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }
    public double calcularPromedio (){
        return (this.parcial1 + this.parcial2 + this.parcial3)/3;
    }
}

class Main {
    public static void main (String[]args) {
        double par1, par2, par3;
        String nombre;
        Scanner entrada = new Scanner (System.in) ;
        System.out.println("Ingrese el Nombre del Estudiante: ");
        nombre = entrada.nextLine();
        System.out.println ("Ingrese Nota de Parcial #1") ;
        par1 = entrada.nextDouble() ;
        System.out.println ("Ingrese Nota de Parcial #2") ;
        par2 = entrada.nextDouble() ;
        System.out.println ("Ingrese Nota de Parcial #3") ;
        par3 = entrada.nextDouble() ;

        Promedio obj = new Promedio(par1, par2, par3, nombre);
        if (obj.calcularPromedio() > 60) {
            System.out.println (obj.getNombre() + " Aprobó") ;
            if (obj.calcularPromedio() < 71){
                System.out.println("Su nota final es D");
            }
            else {
                if (obj.calcularPromedio() < 81){
                System.out.println("Su nota final es C");
                }
                else {
                    if (obj.calcularPromedio() < 91){
                        System.out.println("Su nota final es B");
                    }
                    else {
                        System.out.println("Su nota final es A");
                    }
                }
            }
        }
        else {
            System.out.println (obj.getNombre() + " No Aprobó") ;
            System.out.println("Su nota final es F");
            }
        }
    }
