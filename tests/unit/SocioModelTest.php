<?php

namespace Tests\Unit;

use App\Models\SocioModel;
use App\Models\BeneficioModel;
use CodeIgniter\Test\CIUnitTestCase;


class SocioModelTest extends CIUnitTestCase
{
    protected $socioModel;
    protected $socioId;

    public function setUp(): void
    {
        parent::setUp();
        $this->socioModel = new SocioModel();
        $this->socioModel->insert([
            'nombre' => 'juan reyes',
            'empresa' => 'hermanos gavilanes',
            'correo' => 'esotilin@org.org',
            'estado' => '1',
        ]);
        $this->socioId = $this->socioModel->insertID();
        $beneficioModel = new BeneficioModel();
        $beneficioModel->insert([
            'categoria' => 'prueba',
            'descripcion' => 'prueba en descuentos',
            'socio' => $this->socioId,
        ]);
    }

    public function testGetSocios()
    {
        $result = $this->socioModel->getSocios();
        
        $this->assertIsArray($result);
    }

    public function testGetSociosBeneficios()
    {
        $result = $this->socioModel->getSociosBeneficios();
        
        $this->assertIsArray($result);
    }

    public function testCrearSocio()
    {
        $nombre = 'Juan Perez';
        $empresa = 'Empresa XYZ';
        $direccion = 'Dirección prueba';
        $telefono = '123456789';
        $correo = 'correo@empresa.com';
        $result = $this->socioModel->crearSocio($nombre, $empresa, $direccion, $telefono, $correo);
        
        $this->assertIsInt($result);
    }


    public function testEditarSocio()
    {
        $nombre = 'Nuevo Nombre';
        $empresa = 'Nueva Empresa';
        $correo = 'nuevo@correo.com';
        $direccion = 'Nueva Dirección';
        $telefono = '987654321';

        $this->socioModel->editarSocio($this->socioId, $nombre, $empresa, $correo, $direccion, $telefono);

        $socio = $this->socioModel->find($this->socioId);

        $this->assertEquals($nombre, $socio['nombre']);
        $this->assertEquals($empresa, $socio['empresa']);
        $this->assertEquals($correo, $socio['correo']);
        $this->assertEquals($direccion, $socio['direccion']);
        $this->assertEquals($telefono, $socio['telefono']);
    }

    public function testCambiarEstadoSocio()
    {
        $this->socioModel->cambiarEstadoSocio($this->socioId, 0);
        $socio = $this->socioModel->find($this->socioId);
        $this->assertEquals(0, $socio['activo']);
        $this->socioModel->cambiarEstadoSocio($this->socioId, 1);
        $socio = $this->socioModel->find($this->socioId);
        $this->assertEquals(1, $socio['activo']);
    }

    public function testGetSocio()
    {
        $result = $this->socioModel->getSocio($this->socioId);
        $this->assertIsArray($result);
    }
}
