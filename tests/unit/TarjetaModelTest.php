<?php

namespace Tests\Unit;

use App\Models\TarjetaModel;
use App\Models\ArchivoModel;
use CodeIgniter\Test\CIUnitTestCase;

class TarjetaModelTest extends CIUnitTestCase
{
    protected $tarjetaModel;
    protected $tarjetaId;

    public function setUp(): void
    {
        parent::setUp();
        $archivoModel = new ArchivoModel();
        $this->tarjetaModel = new TarjetaModel();
        $this->tarjetaModel->insert([
            'nombre' => 'javito el bonito',
            'rut' => '12.345.678-9',
            'correo' => 'esotilin@org.org',
            'estado' => '1',
        ]);
        $pixel = 'iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mP8/w8AAwAB/2+Bq5YAAAAASUVORK5CYII=';
        $this->tarjetaId = $this->tarjetaModel->insertID();
        $archivoModel->insert([
            'formato' => 'jpg',
            'archivo' => $pixel,
            'tarjeta' => $this->tarjetaId,
            'tipo' => 'compromiso',
        ]);
    }

    public function testGetRegistros()
    {
        $estado = 1;
        $result = $this->tarjetaModel->getRegistros($estado);
        
        $this->assertIsArray($result);
    }

    public function testGetRegistro()
    {
        $result = $this->tarjetaModel->getRegistro($this->tarjetaId);
        $this->assertIsArray($result);
    }

    public function testCrearRegistro()
    {
        $nombre = 'Nombre prueba';
        $rut = '12345678-9';
        $direccion = 'Dirección prueba';
        $nacimiento = '1990-01-01';
        $telefono = '123456789';
        $correo = 'correo@prueba.com';
        $result = $this->tarjetaModel->crearRegistro($nombre, $rut, $direccion, $nacimiento, $telefono, $correo);
        
        $this->assertIsInt($result);
    }

    public function testEditarRegistro()
    {
        $nombre = 'Nuevo Nombre';
        $rut = '98765432-1';
        $direccion = 'Nueva Dirección';
        $nacimiento = '1995-01-01';
        $telefono = '987654321';
        $correo = 'nuevo@correo.com';
        $this->tarjetaModel->editarRegistro($this->tarjetaId, $nombre, $rut, $direccion, $nacimiento, $telefono, $correo);

        $tarjeta = $this->tarjetaModel->find($this->tarjetaId);

        $this->assertEquals($nombre, $tarjeta['nombre']);
        $this->assertEquals($rut, $tarjeta['rut']);
        $this->assertEquals($direccion, $tarjeta['direccion']);
        $this->assertEquals($nacimiento, $tarjeta['nacimiento']);
        $this->assertEquals($telefono, $tarjeta['telefono']);
        $this->assertEquals($correo, $tarjeta['correo']);
    }

    public function testCambiarEstado()
    {
        $this->tarjetaModel->cambiarEstado($this->tarjetaId, 1);
        $tarjeta = $this->tarjetaModel->find($this->tarjetaId);
        $this->assertEquals(1, $tarjeta['estado']);
        $this->tarjetaModel->cambiarEstado($this->tarjetaId, 2);
        $tarjeta = $this->tarjetaModel->find($this->tarjetaId);
        $this->assertEquals(2, $tarjeta['estado']);
    }
}
