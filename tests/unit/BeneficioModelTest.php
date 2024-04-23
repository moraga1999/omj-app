<?php

namespace Tests\Unit;

use App\Models\BeneficioModel;
use App\Models\SocioModel;
use CodeIgniter\Test\CIUnitTestCase;

class BeneficioModelTest extends CIUnitTestCase
{
    protected $beneficioModel;
    protected $socioId;

    public function setUp(): void
    {
        parent::setUp();
        $this->beneficioModel = new BeneficioModel();
        $socioModel = new SocioModel();
        $socioModel->insert([
            'nombre' => 'juan reyes',
            'empresa' => 'hermanos gavilanes',
            'correo' => 'esotilin@org.org',
        ]);
        $this->socioId = $socioModel->insertID();
        $this->beneficioModel->insert([
            'categoria' => 'prueba',
            'descripcion' => 'prueba en descuentos',
            'socio' => $this->socioId ,
        ]);
    }

    public function testCrearBeneficio()
    {
        $categoria = 'Construccion';
        $descripcion = 'Descuento en eso tilin';
        $result = $this->beneficioModel->crearBeneficio($categoria, $descripcion, $this->socioId);
        
        $this->assertIsInt($result);
    }

    public function testObtenerBeneficio()
    {
        $result = $this->beneficioModel->obtenerBeneficio($this->socioId);
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    public function testEliminarBeneficio()
    {
        $result = $this->beneficioModel->eliminarBeneficio($this->socioId);
        $this->assertEmpty($result);
    }
}
