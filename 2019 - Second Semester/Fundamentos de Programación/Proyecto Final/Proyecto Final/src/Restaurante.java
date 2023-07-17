import java.lang.reflect.Array;
import java.util.Scanner;

class Restaurante {
    Scanner sc = new Scanner(System.in);
    int eleccionMenuPrincipal, opcionConfiguracion, opcionSemana;
    Platillo plato = new Platillo();
    Platillo comida[] = new Platillo[7];
    //Variables para manejar el arreglo de platillos
    int modificar, espacio = 0;
    double precioPlatillo;
    String nombrePlatillo;
    char oferta, configurarOferta = 's', retornarOferta = 'n';
    //Variables para administrar los meseros
    String nombresMeseros[] = new String[3];
    double ventasMeseros[] = new double[3];
    int manejarMeseros = 0;
    char reemplazar;
    //Variables para atencion de clientes
    char atender = 's', producto, jubilado;
    int pedido, cantPedido, orden, mozo;
    int codigoPlatillo[] = new int[15];
    int cantidadPlatillo[] = new int[15];
    //Variables para generar la factura
    double totalCliente, descuentoJubi = 0, valorPlatillo;
    //Variables para generar los reportes diarios
    int opcionReporteSemanal, opcionReporteDiario;
    double ventasDiariasPlatillos[] = new double[7];
    double totalDescuentoJubi = 0;
    double totalPlatilloOferta = 0;
    // Variables para generar los reportes semanales
    double ventaSemanalPlatillos[] = new double[7];
    double totalSemana = 0, montoMayorVendido = 0, montoMenorVendido = 0, opcionPlatilloEspecifico;
    int mayorVendido, menorVendido;




    public void ImprimirMenuPrincipal(){
        System.out.println("\n---------------------------------------");
        System.out.println("           RESTAURANTE ");
        System.out.println("1 - Configuracion");
        System.out.println("2 - Nueva Semana");
        System.out.println("3 - Reportes Semanales");
        System.out.println("4 - Salir");
        System.out.println("---------------------------------------");
    }

    public int ConsultarOpcionPrincipal() {
        System.out.print("Inserte una opción: ");
        eleccionMenuPrincipal = sc.nextInt();
        return eleccionMenuPrincipal;
    }

    public int EvaluarOpcionPrincipal() {
        switch (eleccionMenuPrincipal) {
            case 1:
                // int consultaConfiguracion;
                opcionConfiguracion = ConsultarOpcionConfiguracion();
                while (opcionConfiguracion != 6) {
                    EvaluarOpcionConfiguracion();
                    opcionConfiguracion = ConsultarOpcionConfiguracion();
                }
                break;
            case 2:
                if(espacio > 0 && manejarMeseros > 0){
                    ConsultarOpcionSemana();
                    while(opcionSemana != 3){
                        EvaluarOpcionSemana();
                        ConsultarOpcionSemana();
                    }
                }
                else{
                    System.out.println("(!) Añade al menos un platillo y un mesero para continuar");
                }
                break;
            case 3:
                ConsultarOpcionReportes();
                while (opcionReporteSemanal != 7) {
                    EvaluarReporteSemanal();
                    ConsultarOpcionReportes();
                }
                break;
            default:
                System.out.println("(!) Elija una opción válida");
                break;
        }
        ImprimirMenuPrincipal();
        ConsultarOpcionPrincipal();
        return eleccionMenuPrincipal;
    }

    // METODOS DEL MENU DE CONFIGURACION (001)
    public int ConsultarOpcionConfiguracion() {
        System.out.println("\n----------------------------------------------------");
        System.out.println("                  CONFIGURACION ");
        System.out.println("1 - Añadir platillo");
        System.out.println("2 - Modificar platillo");
        System.out.println("3 - Eliminar platillo");
        System.out.println("4 - Añadir mesero");
        System.out.println("5 - Eliminar mesero");
        System.out.println("6 - Regresar");
        System.out.println("----------------------------------------------------");
        System.out.print("Ingrese su opción: ");
        opcionConfiguracion = sc.nextInt();
        return opcionConfiguracion;
    }

    public void EvaluarOpcionConfiguracion() {
        switch (opcionConfiguracion) {
            case 1:
                if (espacio < 7) {
                    System.out.print("Ingrese el nombre del platillo: ");
                    nombrePlatillo = sc.next();
                    sc.nextLine();
                    System.out.print("Ingrese el precio del platillo: ");
                    precioPlatillo = sc.nextDouble();
                    oferta = 'n';
                    comida[espacio] = new Platillo(nombrePlatillo, precioPlatillo, oferta);
                    espacio++;
                }
                else{
                    System.out.println("Ya ocupó todos los espacios del Menú");
                }
                break;
            case 2:
                ImprimirPlatillos();
                System.out.print("Ingrese el número del platillo a modificar: ");
                modificar = sc.nextInt();
                System.out.print("Ingrese el nombre del platillo: ");
                nombrePlatillo = sc.next();
                System.out.print("Ingrese el precio del platillo: ");
                precioPlatillo = sc.nextDouble();
                comida[modificar] = new Platillo(nombrePlatillo, precioPlatillo, oferta);
                break;
            case 3:
                ImprimirPlatillos();
                System.out.println("Seleccione el platillo a eliminar: ");
                modificar = sc.nextInt();
                System.arraycopy(comida, modificar + 1, comida, modificar, comida.length - 1 - modificar);
                ImprimirPlatillos();
                espacio = espacio - 1;
                break;
            case 4:
                if(manejarMeseros < 3){
                    System.out.print("Ingrese el nombre del nuevo mesero: ");
                    nombresMeseros[manejarMeseros] = sc.next();
                    ventasMeseros[manejarMeseros] = 0;
                    manejarMeseros++;
                }
                else{
                    System.out.print("Ya se asignaron todos los espacios de meseros, ¿desea reemplazar uno? s/n:  ");
                    reemplazar = sc.next().charAt(0);
                    if(reemplazar == 's' || reemplazar == 'S'){
                        ImprimirMeseros();
                        System.out.print("Ingrese el número del mesero a reemplazar: ");
                        modificar = sc.nextInt();
                        nombresMeseros[manejarMeseros] = sc.next();
                        sc.nextLine();
                        ventasMeseros[manejarMeseros] = 0;
                    }
                }
                break;
            case 5:
                ImprimirMeseros();
                System.out.print("Ingrese el número del mesero a eliminar: ");
                modificar = sc.nextInt();
                nombresMeseros[modificar] = null;
                ventasMeseros[modificar] = 0.0;
                break;
            default:
                System.out.println("(!) Elija una opción válida");
                break;
        }
    }

    // METODOS DEL MENU DE SEMANA (002)
    public void ConsultarOpcionSemana(){
        System.out.println("\n---------------------------------------");
        System.out.println("           NUEVA SEMANA ");
        System.out.println("1 - Nuevo día");
        System.out.println("2 - Reporte diario");
        System.out.println("3 - Cerrar semana");
        System.out.println("---------------------------------------");
        System.out.print("Ingrese su opción: ");
        opcionSemana = sc.nextInt();
    }


    public void EvaluarOpcionSemana() {
        switch (opcionSemana) {
            case 1:
                atender = 's';
                DefinirPlatilloOferta();
                InicializarArregloVentaDiaria();
                InicializarArregloVentaMeseros();
                while(atender == 's'){
                    AsignarMesero();
                    ImprimirMenu();
                    producto = 's';
                    totalCliente = 0;
                    orden = 0;
                    descuentoJubi = 0;
                    totalDescuentoJubi = 0;
                    totalPlatilloOferta = 0;
                    System.out.print("Jubilado (s/n): ");
                    jubilado = sc.next().charAt(0);
                    while(producto == 's' || producto == 'S') {
                        try{
                            System.out.print("\nCódigo del platillo: ");
                            codigoPlatillo[orden] = sc.nextInt();
                            System.out.print("Cantidad del platillo: ");
                            cantidadPlatillo[orden] = sc.nextInt();
                            System.out.print("¿Añadirá otro producto? s/n: ");
                            producto = sc.next().charAt(0);
                            orden++;
                        }
                        catch(NullPointerException e){
                        }
                    }
                    GenerarFactura();
                    AcumularValores();
                    System.out.print("¿Atender otro cliente? s/n: ");
                    atender = sc.next().charAt(0);
                }
                RetornarPlatilloOferta();
                break;
            case 2:
                ConsultarReporteDiario();
                while (opcionReporteDiario != 5) {
                    EvaluarReporteDiario();
                    ConsultarReporteDiario();
                }
            default:
                System.out.println("(!) Elija una opción válida");
                break;
        }
    }


    public void DefinirPlatilloOferta() {
        ImprimirMenu();
        System.out.print("Ingrese el código del platillo en oferta (-35%): ");
        modificar = sc.nextInt();
        comida[modificar].setOferta(configurarOferta);
    }

    public void InicializarArregloVentaDiaria() {
        for (int i = 0; i < ventasDiariasPlatillos.length; i++) {
            ventasDiariasPlatillos[i] = 0;
        }
    }

    public void InicializarArregloVentaMeseros(){
        for (int i = 0; i < ventasMeseros.length; i++) {
            ventasMeseros[i] = 0;
        }
    }

    public void RetornarPlatilloOferta() {
        comida[modificar].setOferta(retornarOferta);
    }

    public void AsignarMesero() {
        ImprimirMeseros();
        System.out.print("Código del mesero: ");
        mozo = sc.nextInt();
    }

    public void CalcularTotalCliente(){
        int i = 0;
        while (i < orden) {
            if(comida[codigoPlatillo[i]].getOferta() == 's' && jubilado == 's') {
                valorPlatillo = (comida[codigoPlatillo[i]].getPrecio() * cantidadPlatillo[i] * 0.65);
                totalPlatilloOferta = totalPlatilloOferta + valorPlatillo;
            }
            else if(comida[codigoPlatillo[i]].getOferta() == 's' && jubilado != 's') {
                valorPlatillo = (comida[codigoPlatillo[i]].getPrecio() * cantidadPlatillo[i] * 0.65);
                totalPlatilloOferta = totalPlatilloOferta + valorPlatillo;
            }
            else if(comida[codigoPlatillo[i]].getOferta() != 's' && jubilado == 's') {
                valorPlatillo = (comida[codigoPlatillo[i]].getPrecio() * cantidadPlatillo[i] * 0.70);
                descuentoJubi = descuentoJubi + (comida[codigoPlatillo[i]].getPrecio() * cantidadPlatillo[i] * 0.30);
            }
            else{
                valorPlatillo = (comida[codigoPlatillo[i]].getPrecio() * cantidadPlatillo[i]);
            }
            totalCliente = totalCliente + valorPlatillo;
            ventasDiariasPlatillos[codigoPlatillo[i]] = ventasDiariasPlatillos[codigoPlatillo[i]] + valorPlatillo;
            ventaSemanalPlatillos[codigoPlatillo[i]] = ventaSemanalPlatillos[codigoPlatillo[i]] + valorPlatillo;
            i++;
        }
    }

    public void GenerarFactura() {
        CalcularTotalCliente();
        int i = 0;
        System.out.println("----------------------------------------------------");
        System.out.println("            FACTURA - RESTAURANTE");
        System.out.println("Cantidad     Precio      Platillo");
        while(i < orden) {
            try{
                System.out.printf("    %d       %.2f          %s\n", cantidadPlatillo[i], comida[codigoPlatillo[i]].getPrecio(),
                        comida[codigoPlatillo[i]].getNombre());
                i++;
            }
            catch(NullPointerException a){}
        }
        if (jubilado == 's' || jubilado == 'S') {
            System.out.println("----------------------------------------------------");

            System.out.printf("DESCUENTO(-30%%): %.2f dólares\n", descuentoJubi);
        }
        System.out.printf("TOTAL: %.2f dólares \n", totalCliente);
        System.out.println("----------------------------------------------------");
    }

    public void AcumularValores(){
        ventasMeseros[mozo] = ventasMeseros[mozo] + totalCliente;
        totalDescuentoJubi = totalDescuentoJubi + descuentoJubi;
    }

    public void ConsultarReporteDiario() {
        System.out.println("\n------------------------------------------------------------------------");
        System.out.println("                  REPORTES ");
        System.out.println("1 - Venta diaria por platillo");
        System.out.println("2 - Ventas diarias por encargado de atender las mesas");
        System.out.println("3 - Monto diario otorgado en descuento de jubilado");
        System.out.println("4 - Monto de las ventas diarias con el platillo que se encuentra en oferta");
        System.out.println("5 - Regresar");
        System.out.println("--------------------------------------------------------------------------");
        System.out.print("Ingrese su opción: ");
        opcionReporteDiario = sc.nextInt();
    }

    public void EvaluarReporteDiario() {
        switch (opcionReporteDiario) {
            case 1:
                int i = 0;
                System.out.println("----------------------------------------------------");
                System.out.println("             VENTA DIARIA POR PLATILLO ");
                System.out.println("   Platillo                            Monto");
                while(i <= 7) {
                    try{
                        System.out.printf("  %s                                 %.2f\n", comida[i].getNombre(), ventasDiariasPlatillos[i]);
                        i++;
                    }
                    catch(NullPointerException g){
                        break;
                    }
                }
                System.out.println("----------------------------------------------------");
                break;
            case 2:
                int a = 0;
                System.out.println("----------------------------------------------------");
                System.out.println("   VENTA DIARIA POR ENCARGADO DE ATENDER LAS MESAS ");
                System.out.println("        Mesero                      Monto");
                while(a < 3) {
                    if(nombresMeseros[a] != null) {
                        System.out.printf("         %s                         %.2f\n", nombresMeseros[a], ventasMeseros[a]);
                        a++;
                    }
                }
                System.out.println("----------------------------------------------------");
                break;
            case 3:
                System.out.println("----------------------------------------------------");
                System.out.println("  MONTO DIARIO OTORGADO EN DESCUENTO A JUBILADOS ");
                System.out.printf("Total: %.2f dólares\n", totalDescuentoJubi);
                System.out.println("----------------------------------------------------");
                break;
            case 4:
                System.out.println("----------------------------------------------------------------------------");
                System.out.println("  MONTO DE LAS VENTAS DIARIAS CON EL PLATILLO QUE SE ENCUENTRA EN OFERTA");
                System.out.printf("Total: %.2f dólares\n", totalPlatilloOferta);
                System.out.println("-----------------------------------------------------------------------------");
                break;
            default:
                System.out.println("(!) Elija una opción válida");
                break;
        }

    }
    // METODOS DEL MENU DE REPORTES
    public void ConsultarOpcionReportes() {
        System.out.println("\n------------------------------------------------------------------------");
        System.out.println("                  REPORTES SEMANALES");
        System.out.println("1 - Venta semanal platillo");
        System.out.println("2 - Distribución porcentual por semana de las ventas totales por platillo");
        System.out.println("3 - Platillo más vendido en la semana");
        System.out.println("4 - Platillo menos vendido en la semana");
        System.out.println("5 - Ventas para un día específico");
        System.out.println("6 - Ventas por platillo específico");
        System.out.println("7 - Regresar");
        System.out.println("--------------------------------------------------------------------------");
        System.out.print("Ingrese su opción: ");
        opcionReporteSemanal = sc.nextInt();
    }

    public void CalcularTotalSemanal() {
        for(int i = 0; i < ventaSemanalPlatillos.length; i++){
            totalSemana = totalSemana + ventaSemanalPlatillos[i];
        }
    }
    public void DefinirMayorVendido() {
        for(int i = 0; i < ventaSemanalPlatillos.length; i++) {
            if(ventaSemanalPlatillos[i] > montoMayorVendido){
                montoMayorVendido = ventaSemanalPlatillos[i];
                mayorVendido = i;
            }
        }
    }

    public void DefinirMenosVendido() {
        for (int i = 0; i < ventaSemanalPlatillos.length; i++) {
            if (ventaSemanalPlatillos[i] > montoMenorVendido) {
                montoMenorVendido = ventaSemanalPlatillos[i];
                menorVendido = i;
            }
        }
    }

    public void EvaluarReporteSemanal() {
        switch (opcionReporteSemanal) {
            case 1:
                int i = 0;
                System.out.println("----------------------------------------------------");
                System.out.println("             VENTA SEMANAL POR PLATILLO ");
                System.out.println("   Platillo                            Monto");
                while (i <= 7) {
                    try {
                        System.out.printf("  %s                                 %.2f\n", comida[i].getNombre(), ventaSemanalPlatillos[i]);
                        i++;
                    }
                    catch (NullPointerException g) {
                        break;
                    }
                }
                System.out.println("----------------------------------------------------");
                break;
            case 2:
                int a = 0;
                System.out.println("----------------------------------------------------");
                System.out.println("      DISTRIBUCION PORCENTUAL POR PLATILLO ");
                System.out.println("   Platillo                            Porcentaje");
                while (a <= 7) {
                    try {
                        System.out.printf("  %s                                 %.2f\n", comida[a].getNombre(), ventaSemanalPlatillos[a] * 100 /totalSemana);
                        a++;
                    } catch (NullPointerException g) {
                    }
                }
                System.out.println("----------------------------------------------------");
                break;
            case 3:
                DefinirMayorVendido();
                System.out.println("----------------------------------------------------");
                System.out.println("        PLATILLO MAS VENDIDO EN LA SEMANA ");
                System.out.printf("Mayor vendido: %s     &.2f dólares\n", comida[mayorVendido].getNombre(), montoMayorVendido);
                System.out.println("----------------------------------------------------");
                break;
            case 4:
                DefinirMenosVendido();
                System.out.println("----------------------------------------------------");
                System.out.println("        PLATILLO MENOS VENDIDO EN LA SEMANA ");
                System.out.printf("Menos vendido: %s     &.2f dólares\n", comida[menorVendido].getNombre(), montoMenorVendido);
                System.out.println("----------------------------------------------------");
                break;
            case 5:
                int dia;
                System.out.println("----------------------------------------------------");
                System.out.println("          VENTAS PARA UN DIA ESPECIFICO ");
                dia = sc.nextInt();
                System.out.println("Dia" + dia + "40.0");
                break;
            case 6:
                System.out.println("----------------------------------------------------");
                System.out.println("         VENTAS POR PLATILLO ESPECIFICO");
                ImprimirPlatillos();
                ConsultarOpcionPlatilloEspecifico();
                EvaluarOpcionPlatilloEspecifico();
                int platilloE;
                platilloE = sc.nextInt();
                System.out.println("Arroz con pollo: " + platilloE + 25.00);
            default:
                System.out.println("(!) Elija una opción válida");
                break;
        }
    }

    public void ConsultarOpcionPlatilloEspecifico() {
        System.out.print("Ingrese su opción: ");
        opcionPlatilloEspecifico = sc.nextInt();
    }

    public void EvaluarOpcionPlatilloEspecifico() {

    }


    // METODOS DE IMPRESIONES
    public void ImprimirMeseros(){
        System.out.println("----------------------------------------------------");
        for (int i = 0; i < nombresMeseros.length; i++) {
            if(nombresMeseros[i] != null){
                System.out.printf("Mesero #%d - %s\n", i, nombresMeseros[i]);
            }
        }
        System.out.println("----------------------------------------------------");
    }

    public void ImprimirPlatillos() {
        System.out.println("----------------------------------------------------");
        for (int i = 0; i < comida.length; i++) {
            try {
                System.out.printf("%d. %s\n", i, comida[i].getNombre());
            }
            catch (NullPointerException e) {
            }
        }
        System.out.println("----------------------------------------------------");
    }

    public void ImprimirMenu() {
        System.out.println("----------------------------------------------------");
        System.out.println("                     MENÚ");
        System.out.println("Platillo               -Precio-");
        for (int i = 0; i < comida.length; i++) {
            try{
                System.out.printf("%d. %s              %.2f\n", i, comida[i].getNombre(), comida[i].getPrecio());
            }
            catch(NullPointerException t){
            }
        }
        System.out.println("----------------------------------------------------");
    }

    public static void main(String args[]) {
        Restaurante rest = new Restaurante();
        int opcionPrincipal;
        rest.ImprimirMenuPrincipal();
        opcionPrincipal = rest.ConsultarOpcionPrincipal();
        while (opcionPrincipal != 4) {
            opcionPrincipal = rest.EvaluarOpcionPrincipal();
        }
        System.out.println("Gracias por visitarnos, vuelva pronto");
    }
}