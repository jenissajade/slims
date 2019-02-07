<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['holdings/reports2/acquisitions'] = 'reports_controller/load_pdf';
$route['holdings/reports2'] = 'reports_controller';

$route['circulation/home'] = 'circulations_controller';

$route['holdings/analytics'] = 'analytics_controller';

$route['holdings/catalog'] = 'holdings/holdings_datatable';

$route['holdings/reprints'] = 'holdings_controller/reprintsindex';
$route['holdings/verticalfiles'] = 'holdings_controller/verticalfilesindex';
$route['holdings/investigatoryprojects'] = 'holdings_controller/investigatoryprojectsindex';
$route['holdings/nonprints'] = 'holdings_controller/nonprintsindex';
$route['holdings/multimedia'] = 'holdings_controller/multimediaindex';
$route['holdings/subjects'] = 'holdings_controller/subjectsindex';
$route['holdings/serials'] = 'holdings_controller/serialsindex';
$route['holdings/books'] = 'holdings_controller/booksindex';
$route['holdings/theses'] = 'holdings_controller/thesesindex';
$route['holdings/holdingscopy'] = 'holdings_controller/holdingscopyindex';
$route['holdings/authors'] = 'holdings_controller/viewauthor';
$route['holdings/publications'] = 'holdings_controller/publicationsindex';
$route['holdings/all'] = 'holdings_controller/all';
$route['holdings/catalog'] = 'holdings_controller/holdingscatalogindex';
$route['holdings/uncatalog'] = 'holdings_controller/holdingsuncatalogindex';
$route['holdings/frontpage'] = 'holdings_controller/frontpageindex';
$route['holdings/reports'] = 'holdings_controller';
$route['holdings/home'] = 'holdings_controller';
$route['holdings/reports'] = 'holdings_controller/reportsindex';
$route['holdings/generatereport'] = 'holdings_controller/generate_report';



$route['admin/transactionlogs'] = 'accounts_controller/transactionlogs_view';
$route['admin/updateprofile'] = 'accounts_controller/updateprofile_view';
$route['admin/changepassword'] = 'accounts_controller/changepassword_view';
$route['admin/datalibrary'] = 'accounts_controller/datalibrary_view';
$route['admin/modules'] = 'accounts_controller/module_view';
$route['admin/agencies'] = 'accounts_controller/agency_view';
$route['admin/groups'] = 'accounts_controller/group_view';
$route['admin/accounts/accounts'] = 'accounts_controller/accounts';
$route['admin/accounts/(:any)'] = 'accounts_controller/view/$1';
$route['admin/accounts'] = 'accounts_controller';

$route['login/logout'] = 'login/logout';
$route['login/login'] = 'login/login';
$route['login/(:any)'] = 'login/view/$1';
$route['login'] = 'login';

$route['acquisitions/new_acquisitions/newacquisition'] = 'acquisitions_controller/newacquisition';
$route['acquisitions/new_acquisitions/(:any)'] = 'acquisitions_controller/view/$1';
$route['acquisitions/new_acquisitions'] = 'acquisitions_controller';

$route['acquisitions/accession_book/accessionbook'] = 'book_controller/accessionbook';
$route['acquisitions/accession_book/(:any)'] = 'book_controller/view/$1';
$route['acquisitions/accession_book'] = 'book_controller';

$route['acquisitions/monitoring_serial/monitorserialmaterial'] = 'monitoring_controller/monitorserialmaterial';
$route['acquisitions/monitoring_serial/(:any)'] = 'monitoring_controller/view/$1';
$route['acquisitions/monitoring_serial'] = 'monitoring_controller';

$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;