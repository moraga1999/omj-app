<?php

namespace Tests\Unit;

use App\Models\ArchivoModel;
use App\Models\TarjetaModel;
use CodeIgniter\Test\CIUnitTestCase;

class ArchivoModelTest extends CIUnitTestCase
{
    protected $archivoModel;
    protected $tarjetaId;
    protected $pixel;

    public function setUp(): void
    {
        parent::setUp();
        $this->archivoModel = new ArchivoModel();
        $tarjetaModel = new TarjetaModel();
        $tarjetaModel->insert([
            'nombre' => 'javito el bonito',
            'rut' => '12.345.678-9',
            'correo' => 'esotilin@org.org',
        ]);
        $this->pixel = 'iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mP8/w8AAwAB/2+Bq5YAAAAASUVORK5CYII=';
        $this->tarjetaId = $tarjetaModel->insertID();
        $this->archivoModel->insert([
            'formato' => 'jpg',
            'archivo' => $this->pixel,
            'tarjeta' => $this->tarjetaId,
            'tipo' => 'compromiso',
        ]);
    }

    public function testGetTipoArchivos()
    {
        $result = $this->archivoModel->getTipoArchivos($this->tarjetaId);
        
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    public function testGetArchivosTarjeta()
    {
        $result = $this->archivoModel->getArchivosTarjeta($this->tarjetaId);
        
        $this->assertIsArray($result);
    }

    public function testGetArchivo()
    {
        $archivoId = $this->archivoModel->insertID();
        $result = $this->archivoModel->getArchivo($archivoId);
        
        $this->assertIsArray($result);
    }

    public function testGuardarArchivo()
    {
        $tarjeta = $this->tarjetaId;
        $archivo = $this->pixel;
        $formato = 'jpg';
        $tipo = 'tarjeta';
        $result = $this->archivoModel->guardarArchivo($tarjeta, $archivo, $formato, $tipo);
        
        $this->assertIsInt($result);
    }

    public function testEliminarArchivos()
    {
        $this->archivoModel->eliminarArchivos($this->tarjetaId);
        $result = $this->archivoModel->getArchivosTarjeta($this->tarjetaId);
        
        $this->assertEmpty($result);
    }
}
