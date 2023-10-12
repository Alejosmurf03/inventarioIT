<?php

include '../../administrador/PDF/validacion.php';

//llama al archivo que esta en la carpeta fpdf para poder generar los pdf
require ('./fpdf/fpdf.php');

//añade la clase i la extencion del pdf
class PDF extends FPDF {

    // Cabecera de página
    function Header() {
        //Posicion del texto
        $this->SetXY(15, 20);
        //Logo de la empresa
        $this->Image('img/halli.png', 20, 13, 33);
        // Tipo de letra y tamaño
        $this->SetFont('Arial', 'B', 25);
        // Movernos a la derecha
        $this->Cell(63);
        // Título
        $this->SetTextColor(229, 0, 0);
        $this->Cell(60, 10, 'HALLIBURTON', 0, 0, 'C');
        //Ancho de la linea y posicion de ella
        $this->SetLineWidth(0.7);
        $this->Line(20, 30, 190, 30);
        // Salto de línea
        $this->Ln(30);
        //Informacion 
        $this->SetTextColor(0,0,0);
        $this->SetFont('Arial', 'B', 14);
        $this->SetLineWidth(0.6);
        $this->Cell(190, 18, 'Reporte Inventario IT', 1, 1, 'C');
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(64, 10, 'Fecha: ' . date('d') . '-' . date('F') . '-' . date('Y'), 1, 0, 'C');
        $this->Cell(63, 10, 'Usuario: ' . $_SESSION['HUsuario'], 1, 0, 'C');
        $this->Cell(63, 10, 'Rol: ' . $_SESSION['nombreRol'], 1, 0, 'C');
        // Salto de línea
        $this->Ln(20);
        //Celdas de la tabla
        $this->SetLineWidth(0.4);
        $this->SetFont('Arial', 'B', 13);
        $this->Cell(190, 15, 'INVENTARIO IT', 1, 1, 'C', 0);
        $this->SetFont('Arial', 'B', 13);
        $this->Cell(95, 15, 'Nombre', 1, 0, 'C', 0);
        $this->Cell(48, 15, 'Estado', 1, 0, 'C', 0);
        $this->Cell(47, 15, 'Cantidad', 1, 1, 'C', 0);
    }

    // Pie de página
    function Footer() {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 10);
        // Número de página
        $this->Cell(0, 10, 'Pagina ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

}

require '../../../Modelo/conexion.php';
$mysqli = new mysqli("localhost","root","","inventario_it");
//consulta a la base de datos
$consulta = "select tipo_material.nombre, material.ID_tipo,material.estado,base.nombre As nombreBase, "
        . "count(ID_tipo) as cantidadTipo from material inner join tipo_material "
        . "on tipo_material.ID_tipo_material = material.ID_tipo inner "
        . "join base on base.ID_base = material.ID_base where base.nombre= 'Yopal' "
        . "group by tipo_material.nombre, material.estado, base.nombre";
$resultado = $mysqli->query($consulta);

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);
//informacion de la base de datos
if ($resultado->num_rows < 1) {
    $pdf->Cell(190, 15, 'No Hay Resultados', 1, 0, 'C');
} else {
    while ($row = $resultado->fetch_assoc()) {
        $pdf->Cell(95, 10, $row['nombre'], 1, 0, 'C', 0);
        $pdf->Cell(48, 10, $row['estado'], 1, 0, 'C', 0);
        $pdf->Cell(47, 10, $row['cantidadTipo'], 1, 1, 'C', 0);
    }
}
$pdf->Output();
?>