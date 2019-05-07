<?php


namespace Kernel\Asyn\Http;

class ContentType
{
    const MAP = [
        'ez' => 'application/andrew-inset',
        'aw' => 'application/applixware',
        'atom' => 'application/atom+xml',
        'atomcat' => 'application/atomcat+xml',
        'atomsvc' => 'application/atomsvc+xml',
        'bdoc' => 'application/bdoc',
        'ccxml' => 'application/ccxml+xml',
        'cdmia' => 'application/cdmi-capability',
        'cdmic' => 'application/cdmi-container',
        'cdmid' => 'application/cdmi-domain',
        'cdmio' => 'application/cdmi-object',
        'cdmiq' => 'application/cdmi-queue',
        'cu' => 'application/cu-seeme',
        'mpd' => 'application/dash+xml',
        'davmount' => 'application/davmount+xml',
        'dbk' => 'application/docbook+xml',
        'dssc' => 'application/dssc+der',
        'xdssc' => 'application/dssc+xml',
        'ecma' => 'application/ecmascript',
        'emma' => 'application/emma+xml',
        'epub' => 'application/epub+zip',
        'exi' => 'application/exi',
        'pfr' => 'application/font-tdpfr',
        'woff' => 'application/font-woff',
        'geojson' => 'application/geo+json',
        'gml' => 'application/gml+xml',
        'gpx' => 'application/gpx+xml',
        'gxf' => 'application/gxf',
        'gz' => 'application/gzip',
        'hjson' => 'application/hjson',
        'stk' => 'application/hyperstudio',
        'ink' => 'application/inkml+xml',
        'inkml' => 'application/inkml+xml',
        'ipfix' => 'application/ipfix',
        'jar' => 'application/java-archive',
        'war' => 'application/java-archive',
        'ear' => 'application/java-archive',
        'ser' => 'application/java-serialized-object',
        'class' => 'application/java-vm',
        'js' => 'application/javascript',
        'mjs' => 'application/javascript',
        'json' => 'application/json',
        'map' => 'application/json',
        'json5' => 'application/json5',
        'jsonml' => 'application/jsonml+json',
        'jsonld' => 'application/ld+json',
        'lostxml' => 'application/lost+xml',
        'hqx' => 'application/mac-binhex40',
        'cpt' => 'application/mac-compactpro',
        'mads' => 'application/mads+xml',
        'webmanifest' => 'application/manifest+json',
        'mrc' => 'application/marc',
        'mrcx' => 'application/marcxml+xml',
        'ma' => 'application/mathematica',
        'nb' => 'application/mathematica',
        'mb' => 'application/mathematica',
        'mathml' => 'application/mathml+xml',
        'mbox' => 'application/mbox',
        'mscml' => 'application/mediaservercontrol+xml',
        'metalink' => 'application/metalink+xml',
        'meta4' => 'application/metalink4+xml',
        'mets' => 'application/mets+xml',
        'mods' => 'application/mods+xml',
        'm21' => 'application/mp21',
        'mp21' => 'application/mp21',
        'mp4s' => 'application/mp4',
        'm4p' => 'application/mp4',
        'doc' => 'application/msword',
        'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        'dot' => 'application/msword',
        'mxf' => 'application/mxf',
        'bin' => 'application/octet-stream',
        'dms' => 'application/octet-stream',
        'lrf' => 'application/octet-stream',
        'mar' => 'application/octet-stream',
        'so' => 'application/octet-stream',
        'dist' => 'application/octet-stream',
        'distz' => 'application/octet-stream',
        'pkg' => 'application/octet-stream',
        'bpk' => 'application/octet-stream',
        'dump' => 'application/octet-stream',
        'elc' => 'application/octet-stream',
        'deploy' => 'application/octet-stream',
        'exe' => 'application/octet-stream',
        'dll' => 'application/octet-stream',
        'deb' => 'application/octet-stream',
        'dmg' => 'application/octet-stream',
        'iso' => 'application/octet-stream',
        'img' => 'application/octet-stream',
        'msi' => 'application/octet-stream',
        'msp' => 'application/octet-stream',
        'msm' => 'application/octet-stream',
        'buffer' => 'application/octet-stream',
        'oda' => 'application/oda',
        'opf' => 'application/oebps-package+xml',
        'ogx' => 'application/ogg',
        'omdoc' => 'application/omdoc+xml',
        'onetoc' => 'application/onenote',
        'onetoc2' => 'application/onenote',
        'onetmp' => 'application/onenote',
        'onepkg' => 'application/onenote',
        'oxps' => 'application/oxps',
        'xer' => 'application/patch-ops-error+xml',
        'pdf' => 'application/pdf',
        'pgp' => 'application/pgp-encrypted',
        'asc' => 'application/pgp-signature',
        'sig' => 'application/pgp-signature',
        'prf' => 'application/pics-rules',
        'p10' => 'application/pkcs10',
        'p7m' => 'application/pkcs7-mime',
        'p7c' => 'application/pkcs7-mime',
        'p7s' => 'application/pkcs7-signature',
        'p8' => 'application/pkcs8',
        'ac' => 'application/pkix-attr-cert',
        'cer' => 'application/pkix-cert',
        'crl' => 'application/pkix-crl',
        'pkipath' => 'application/pkix-pkipath',
        'pki' => 'application/pkixcmp',
        'pls' => 'application/pls+xml',
        'ai' => 'application/postscript',
        'eps' => 'application/postscript',
        'ps' => 'application/postscript',
        'pskcxml' => 'application/pskc+xml',
        'raml' => 'application/raml+yaml',
        'rdf' => 'application/rdf+xml',
        'rif' => 'application/reginfo+xml',
        'rnc' => 'application/relax-ng-compact-syntax',
        'rl' => 'application/resource-lists+xml',
        'rld' => 'application/resource-lists-diff+xml',
        'rs' => 'application/rls-services+xml',
        'gbr' => 'application/rpki-ghostbusters',
        'mft' => 'application/rpki-manifest',
        'roa' => 'application/rpki-roa',
        'rsd' => 'application/rsd+xml',
        'rss' => 'application/rss+xml',
        'rtf' => 'application/rtf',
        'sbml' => 'application/sbml+xml',
        'scq' => 'application/scvp-cv-request',
        'scs' => 'application/scvp-cv-response',
        'spq' => 'application/scvp-vp-request',
        'spp' => 'application/scvp-vp-response',
        'sdp' => 'application/sdp',
        'setpay' => 'application/set-payment-initiation',
        'setreg' => 'application/set-registration-initiation',
        'shf' => 'application/shf+xml',
        'smi' => 'application/smil+xml',
        'smil' => 'application/smil+xml',
        'rq' => 'application/sparql-query',
        'srx' => 'application/sparql-results+xml',
        'gram' => 'application/srgs',
        'grxml' => 'application/srgs+xml',
        'sru' => 'application/sru+xml',
        'ssdl' => 'application/ssdl+xml',
        'ssml' => 'application/ssml+xml',
        'tei' => 'application/tei+xml',
        'teicorpus' => 'application/tei+xml',
        'tfi' => 'application/thraud+xml',
        'tsd' => 'application/timestamped-data',
        'vxml' => 'application/voicexml+xml',
        'wasm' => 'application/wasm',
        'wgt' => 'application/widget',
        'hlp' => 'application/winhlp',
        'wsdl' => 'application/wsdl+xml',
        'wspolicy' => 'application/wspolicy+xml',
        'xaml' => 'application/xaml+xml',
        'xdf' => 'application/xcap-diff+xml',
        'xenc' => 'application/xenc+xml',
        'xhtml' => 'application/xhtml+xml',
        'xht' => 'application/xhtml+xml',
        'xml' => 'application/xml',
        'xsl' => 'application/xml',
        'xsd' => 'application/xml',
        'rng' => 'application/xml',
        'dtd' => 'application/xml-dtd',
        'xop' => 'application/xop+xml',
        'xpl' => 'application/xproc+xml',
        'xslt' => 'application/xslt+xml',
        'xspf' => 'application/xspf+xml',
        'mxml' => 'application/xv+xml',
        'xhvml' => 'application/xv+xml',
        'xvml' => 'application/xv+xml',
        'xvm' => 'application/xv+xml',
        'yang' => 'application/yang',
        'yin' => 'application/yin+xml',
        'zip' => 'application/zip',
        '*3gpp' => 'audio/3gpp',
        'adp' => 'audio/adpcm',
        'au' => 'audio/basic',
        'snd' => 'audio/basic',
        'mid' => 'audio/midi',
        'midi' => 'audio/midi',
        'kar' => 'audio/midi',
        'rmi' => 'audio/midi',
        '*mp3' => 'audio/mp3',
        'm4a' => 'audio/mp4',
        'mp4a' => 'audio/mp4',
        'mpga' => 'audio/mpeg',
        'mp2' => 'audio/mpeg',
        'mp2a' => 'audio/mpeg',
        'mp3' => 'audio/mpeg',
        'm2a' => 'audio/mpeg',
        'm3a' => 'audio/mpeg',
        'oga' => 'audio/ogg',
        'ogg' => 'audio/ogg',
        'spx' => 'audio/ogg',
        's3m' => 'audio/s3m',
        'sil' => 'audio/silk',
        'wav' => 'audio/wav',
        '*wav' => 'audio/wave',
        'weba' => 'audio/webm',
        'xm' => 'audio/xm',
        'ttc' => 'font/collection',
        'otf' => 'font/otf',
        'ttf' => 'font/ttf',
        '*woff' => 'font/woff',
        'woff2' => 'font/woff2',
        'apng' => 'image/apng',
        'bmp' => 'image/bmp',
        'cgm' => 'image/cgm',
        'g3' => 'image/g3fax',
        'gif' => 'image/gif',
        'ief' => 'image/ief',
        'jp2' => 'image/jp2',
        'jpg2' => 'image/jp2',
        'jpeg' => 'image/jpeg',
        'jpg' => 'image/jpeg',
        'jpe' => 'image/jpeg',
        'jpm' => 'image/jpm',
        'jpx' => 'image/jpx',
        'jpf' => 'image/jpx',
        'ktx' => 'image/ktx',
        'png' => 'image/png',
        'sgi' => 'image/sgi',
        'svg' => 'image/svg+xml',
        'svgz' => 'image/svg+xml',
        'tiff' => 'image/tiff',
        'tif' => 'image/tiff',
        'webp' => 'image/webp',
        'disposition-notification' => 'message/disposition-notification',
        'u8msg' => 'message/global',
        'u8dsn' => 'message/global-delivery-status',
        'u8mdn' => 'message/global-disposition-notification',
        'u8hdr' => 'message/global-headers',
        'eml' => 'message/rfc822',
        'mime' => 'message/rfc822',
        'gltf' => 'model/gltf+json',
        'glb' => 'model/gltf-binary',
        'igs' => 'model/iges',
        'iges' => 'model/iges',
        'msh' => 'model/mesh',
        'mesh' => 'model/mesh',
        'silo' => 'model/mesh',
        'wrl' => 'model/vrml',
        'vrml' => 'model/vrml',
        'x3db' => 'model/x3d+binary',
        'x3dbz' => 'model/x3d+binary',
        'x3dv' => 'model/x3d+vrml',
        'x3dvz' => 'model/x3d+vrml',
        'x3d' => 'model/x3d+xml',
        'x3dz' => 'model/x3d+xml',
        'appcache' => 'text/cache-manifest',
        'manifest' => 'text/cache-manifest',
        'ics' => 'text/calendar',
        'ifb' => 'text/calendar',
        'coffee' => 'text/coffeescript',
        'litcoffee' => 'text/coffeescript',
        'css' => 'text/css',
        'csv' => 'text/csv',
        'html' => 'text/html',
        'htm' => 'text/html',
        'shtml' => 'text/html',
        'jade' => 'text/jade',
        'jsx' => 'text/jsx',
        'less' => 'text/less',
        'markdown' => 'text/markdown',
        'md' => 'text/markdown',
        'mml' => 'text/mathml',
        'n3' => 'text/n3',
        'txt' => 'text/plain',
        'text' => 'text/plain',
        'conf' => 'text/plain',
        'def' => 'text/plain',
        'list' => 'text/plain',
        'log' => 'text/plain',
        'in' => 'text/plain',
        'ini' => 'text/plain',
        'rtx' => 'text/richtext',
        '*rtf' => 'text/rtf',
        'sgml' => 'text/sgml',
        'sgm' => 'text/sgml',
        'shex' => 'text/shex',
        'slim' => 'text/slim',
        'slm' => 'text/slim',
        'stylus' => 'text/stylus',
        'styl' => 'text/stylus',
        'tsv' => 'text/tab-separated-values',
        't' => 'text/troff',
        'tr' => 'text/troff',
        'roff' => 'text/troff',
        'man' => 'text/troff',
        'me' => 'text/troff',
        'ms' => 'text/troff',
        'ttl' => 'text/turtle',
        'uri' => 'text/uri-list',
        'uris' => 'text/uri-list',
        'urls' => 'text/uri-list',
        'vcard' => 'text/vcard',
        'vtt' => 'text/vtt',
        '*xml' => 'text/xml',
        'yaml' => 'text/yaml',
        'yml' => 'text/yaml',
        '3gp' => 'video/3gpp',
        '3gpp' => 'video/3gpp',
        '3g2' => 'video/3gpp2',
        'h261' => 'video/h261',
        'h263' => 'video/h263',
        'h264' => 'video/h264',
        'jpgv' => 'video/jpeg',
        '*jpm' => 'video/jpm',
        'jpgm' => 'video/jpm',
        'mj2' => 'video/mj2',
        'mjp2' => 'video/mj2',
        'ts' => 'video/mp2t',
        'mp4' => 'video/mp4',
        'mp4v' => 'video/mp4',
        'mpg4' => 'video/mp4',
        'mpeg' => 'video/mpeg',
        'mpg' => 'video/mpeg',
        'mpe' => 'video/mpeg',
        'm1v' => 'video/mpeg',
        'm2v' => 'video/mpeg',
        'ogv' => 'video/ogg',
        'qt' => 'video/quicktime',
        'mov' => 'video/quicktime',
        'webm' => 'video/webm',
        // https://developer.mozilla.org/en-US/docs/Web/HTTP/Basics_of_HTTP/MIME_types/Complete_list_of_MIME_types
        'aac' => 'audio/aac',
        'abw' => 'application/x-abiword',
        'arc' => 'application/octet-stream',
        'avi' => 'video/x-msvideo',
        'azw' => 'application/vnd.amazon.ebook',
        'bz' => 'application/x-bzip',
        'bz2' => 'application/x-bzip2',
        'csh' => 'application/x-csh',
        'eot' => 'application/vnd.ms-fontobject',
        'es' => 'application/ecmascript',
        'ico' => 'image/x-icon',
        'mpkg' => 'application/vnd.apple.installer+xml',
        'odp' => 'application/vnd.oasis.opendocument.presentation',
        'ods' => 'application/vnd.oasis.opendocument.spreadsheet',
        'odt' => 'application/vnd.oasis.opendocument.text',
        'ppt' => 'application/vnd.ms-powerpoint',
        'pptx' => 'application/vnd.openxmlformats-officedocument.presentationml.presentation',
        'rar' => 'application/x-rar-compressed',
        'sh' => 'application/x-sh',
        'swf' => 'application/x-shockwave-flash',
        'tar' => 'application/x-tar',
        'vsd' => 'application/vnd.visio',
        'xls' => 'application/vnd.ms-excel',
        'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        'xul' => 'application/vnd.mozilla.xul+xml',
        '7z' => 'application/x-7z-compressed',
        'js' => 'text/javascript',
        'query' => 'application/x-www-form-urlencoded',
        'multipart' => 'ultipart/form-data',
        'binary' => 'application/octet-stream'
    ];
    public static function get(string $suffix): string
    {
        $suffix = strtolower($suffix);
        return self::MAP[$suffix] ?? '';
    }
}
