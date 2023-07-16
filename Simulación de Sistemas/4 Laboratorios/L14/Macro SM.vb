Sub ciclos()
Dim i As Long, c As Long
Dim Beneficio As Double
c = Val(InputBox("iteraciones?", , 1000))
Columns("K:K").Clear
Range("A1").Select
For i = 1 To c
    Beneficio = Range("C27")
    Range("I14") = i
    Cells(i, "K") = Beneficio
Next i
End Sub