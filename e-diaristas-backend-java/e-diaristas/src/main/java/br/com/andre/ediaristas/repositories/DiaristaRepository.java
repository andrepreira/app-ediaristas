package br.com.andre.ediaristas.repositories;

import org.springframework.data.jpa.repository.JpaRepository;

import br.com.andre.ediaristas.models.Diarista;

public interface DiaristaRepository extends JpaRepository<Diarista, Long> {
    
}
