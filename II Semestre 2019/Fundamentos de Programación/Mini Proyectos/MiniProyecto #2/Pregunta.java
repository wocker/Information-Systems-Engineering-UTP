public class Pregunta {
  public String enun, pos1, pos2, pos3, corr;
  public int pun;

  Pregunta(String enunciado, String posible1, String posible2, String posible3, String correcta, int puntos){
    enun = enunciado;
    pos1 = posible1;
    pos2 = posible2;
    pos3 = posible3;
    corr = correcta;
    pun = puntos;
  }

  public Pregunta(){
    enun = "";
    pos1 = "";
    pos2 = "";
    pos3 = "";
    corr = "";
    pun = 0;
  }

  public String getEnunciado() {
    return enun;
  }

  public String getPosible1() {
    return pos1;
  }

  public String getPosible2() {
    return pos2;
  }

  public String getPosible3() {
    return pos3;
  }

  public String getCorrecta() {
    return corr;
  }

  public int getPuntos() {
    return pun;
  }
}