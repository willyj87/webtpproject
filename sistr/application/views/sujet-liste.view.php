<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 16/12/16
 * Time: 09:38
 */
namespace Sistr;
defined('SISTR') or die('Acces Denied');
?>
<div class="col-md-10">
    <h1 class="page-header">
        Sujets : Sujets terminés
    </h1>
    <div class="col-md-5">
        <div class="btn-group btn-group-justified" role="group" aria-label="...">
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-default">Créer</button>
            </div>
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-default">Modifier</button>
            </div>
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-default">Affecter</button>
            </div>
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-default">Supprimer</button>
            </div>
        </div>
    </div>
    <div class="page-header" id="test"></div>
    <table class="table table-bordered">
        <tr>
            <th>
                <span class="glyphicon glyphicon-unchecked check" aria-hidden="true"></span>
            </th>
            <th>
                Titre
            </th>
            <th>
                Proposé
            </th>
            <th>
                Groupe
            </th>
            <th>
                Status
            </th>
        </tr>
        <tr>
            <td>
                <span class="glyphicon glyphicon-unchecked" aria-hidden="true"></span>
            </td>
            <td>
                Virtual Ducks
            </td>
            <td>
                2016-09-20
            </td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>
                <span class="glyphicon glyphicon-unchecked" aria-hidden="true"></span>
            </td>
            <td>
                Virtual Ducks
            </td>
            <td>
                2016-09-20
            </td>
            <td>
                Terminés
            </td>
        </tr>
    </table>
</div>
