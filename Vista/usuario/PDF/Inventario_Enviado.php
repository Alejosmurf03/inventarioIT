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
        $this->Cell(110);
        // Título
        $this->SetTextColor(229, 0, 0);
        $this->Cell(60, 10, 'HALLIBURTON', 0, 0, 'C');
        //Ancho de la linea y posicion de ella
        $this->SetLineWidth(0.7);
        $this->Line(20, 30, 270, 30);
        // Salto de línea
        $this->Ln(30);
        //Informacion 
        $this->SetTextColor(0, 0, 0);
        $this->SetFont('Arial', 'B', 14);
        $this->SetLineWidth(0.6);
        $this->Cell(250, 18, 'Reporte Inventario IT', 1, 1, 'C');
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(83, 10, 'Fecha: ' . date('d') . '-' . date('F') . '-' . date('Y'), 1, 0, 'C');
        $this->Cell(84, 10, 'Usuario: ' . $_SESSION['HUsuario'], 1, 0, 'C');
        $this->Cell(83, 10, 'Rol: ' . $_SESSION['nombreRol'], 1, 0, 'C');
        // Salto de línea
        $this->Ln(20);
        //Celdas de la tabla
        $this->SetLineWidth(0.4);
        $this->SetFont('Arial', 'B', 13);
        $this->Cell(250, 15, 'INVENTARIO IT', 1, 1, 'C', 0);
        $this->SetFont('Arial', 'B', 13);
        $this->Cell(32, 15, 'Cod Barras', 1, 0, 'C', 0);
        $this->Cell(32, 15, 'Serial', 1, 0, 'C', 0);
        $this->Cell(64, 15, 'Tipo De Elemento', 1, 0, 'C', 0);
        $this->Cell(31, 15, 'Fecha', 1, 0, 'C', 0);
        $this->Cell(31, 15, 'Base', 1, 0, 'C', 0);
        $this->Cell(60, 15, 'Observacion', 1, 1, 'C', 0);
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

$base = $_SESSION["base"];
require '../../../Modelo/conexion.php';
$mysqli = new mysqli("localhost","root","","inventario_it");
//consulta a la base de datos
$consulta = "SELECT material.cod_barras AS Codigo,
                                material.serial_equipo AS Serial,
                                tipo_material.nombre AS Tipo,
                                envio.fecha_envio AS Fecha,
                                base.nombre AS base,
                                envio.observa_envio AS Observacion
                        FROM 	
                                material INNER JOIN envio_has_material ON material.ID_material = envio_has_material.ID_material 
                                INNER JOIN envio ON envio_has_material.ID_envio = envio.ID_envio 
                                INNER JOIN base ON envio.ID_base_destino = base.ID_base 
                                INNER JOIN tipo_material ON material.ID_tipo = tipo_material.ID_tipo_material 
                        WHERE 
                                material.estado = 'Enviado' AND base.nombre = '$base'";
$resultado = $mysqli->query($consulta);

// Creación del objeto de la clase heredada
$pdf = new PDF('l');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);
//informacion de la base de datos
if ($resultado->num_rows < 1) {
    $pdf->Cell(250, 15, 'No Hay Resultados', 1, 0, 'C');
} else {
    while ($row = $resultado->fetch_assoc()) {
        $pdf->Cell(32, 12, $row['Codigo'], 1, 0, 'C', 0);
        $pdf->Cell(32, 12, $row['Serial'], 1, 0, 'C', 0);
        $pdf->Cell(64, 12, $row['Tipo'], 1, 0, 'C', 0);
        $pdf->Cell(31, 12, $row['Fecha'], 1, 0, 'C', 0);
        $pdf->Cell(31, 12, $row['base'], 1, 0, 'C', 0);
        $pdf->Cell(60, 12, $row['Observacion'], 1, 0, 'C', 0);
    }
}
$pdf->Output();
?>