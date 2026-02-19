<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAuthorizedIP
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $authorizedIps = config('app.authorized_ip_addresses', []);
        $clientIp = $request->ip();

        // Permitir todas las IPs si '0.0.0.0' o '::' está en la lista
        if (in_array('0.0.0.0', $authorizedIps) || in_array('::', $authorizedIps)) {
            return $next($request);
        }

        // Soporte para rangos CIDR y comparación exacta
        foreach ($authorizedIps as $ipOrRange) {
            if (self::ipMatches($clientIp, $ipOrRange)) {
                return $next($request);
            }
        }

        return response()->json([
            'error' => 'Dirección IP no autorizada. No puedes acceder a este recurso.',
            'ip' => $clientIp,
            'authorized_ips' => $authorizedIps,
        ], 403);
    }

    /**
     * Verifica si una IP está dentro de un rango CIDR o es igual a una IP específica.
     */
    protected static function ipMatches(string $ip, string $ipOrRange): bool
    {
        // Si es un rango CIDR
        if (strpos($ipOrRange, '/') !== false) {
            return self::ipInRange($ip, $ipOrRange);
        }
        // Comparación exacta
        return $ip === $ipOrRange;
    }

    /**
     * Verifica si una IP está dentro de un rango CIDR.
     */
    protected static function ipInRange(string $ip, string $cidr): bool
    {
        if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            list($subnet, $mask) = explode('/', $cidr);
            $ipLong = ip2long($ip);
            $subnetLong = ip2long($subnet);
            $maskLong = -1 << (32 - (int)$mask);
            return ($ipLong & $maskLong) === ($subnetLong & $maskLong);
        } elseif (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            // Soporte básico para IPv6 CIDR
            list($subnet, $mask) = explode('/', $cidr);
            $ipBin = inet_pton($ip);
            $subnetBin = inet_pton($subnet);
            $mask = (int)$mask;
            $bytes = (int)($mask / 8);
            $bits = $mask % 8;
            if (strncmp($ipBin, $subnetBin, $bytes) !== 0) {
                return false;
            }
            if ($bits === 0) {
                return true;
            }
            $ipByte = ord($ipBin[$bytes]);
            $subnetByte = ord($subnetBin[$bytes]);
            $maskByte = 0xFF << (8 - $bits) & 0xFF;
            return ($ipByte & $maskByte) === ($subnetByte & $maskByte);
        }
        return false;
    }
}
